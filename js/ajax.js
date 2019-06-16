$( document ).ready(function() {

    var url = "localhost/fthing/";
    var page = 1;
    var current_page = 1;
    var total_page = 0;
    var is_ajax_fire = 0;
    
    manageData();
    
    /* tampilkan data */
    function manageData() {
        $.ajax({
            dataType: 'json',
            url: 'api/view.php',
            data: {page:page}
        }).done(function(data){
            total_page = Math.ceil(data.total/10);
            current_page = page;
    
            $('#pagination').twbsPagination({
                totalPages: total_page,
                visiblePages: current_page,
                onPageClick: function (event, pageL) {
                    page = pageL;
                    if(is_ajax_fire != 0){
                      getPageData();
                    }
                }
            });
    
            manageRow(data.data);
            is_ajax_fire = 1;
    
        });
    
    }
    
    /* tampilkan  data */
    function getPageData() {
        $.ajax({
            dataType: 'json',
            url: 'api/view.php',
            data: {page:page}
        }).done(function(data){
            manageRow(data.data);
        });
    }
    
    
    /* tambahkan data baru pada table */
    function manageRow(data) {
        var	rows = '';
        $.each( data, function( key, value ) {
              rows = rows + '<tr>';
              rows = rows + '<td>'+value.name+'</td>';
              rows = rows + '<td>'+value.email+'</td>';
              rows = rows + '<td>'+value.gender+'</td>';
              rows = rows + '<td>'+value.ismarried+'</td>';
              rows = rows + '<td>'+value.address+'</td>';
              rows = rows + '<td data-id="'+value.id+'">';
            rows = rows + '<button data-toggle="modal" data-target="#edit-user" class="btn btn-primary btn-sm edit-user"> <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> Edit</button> ';
            rows = rows + '<button class="btn btn-danger btn-sm remove-user"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span> Hapus</button>';
            rows = rows + '</td>';
              rows = rows + '</tr>';
        });
    
        $("tbody").html(rows);
    }
    
    /* tambah user */
    $(".crud-submit").click(function(e){
        e.preventDefault();
        var form_action = $("#create-user").find("form").attr("action");
        var name = $("#create-user").find("input[name='name']").val();
        var email = $("#create-user").find("input[name='email']").val();
        var password = $("#create-user").find("input[name='password']").val();
        var gender = $("#create-user").find("input[name='gender']:checked").val();
        var ismarried = $("#create-user").find("input[name='ismarried']:checked").val();
        var address = $("#create-user").find("input[name='address']").val();
      
        if(name != '' && email != '' && address != ''){
            $.ajax({
                dataType: 'json',
                type:'POST',
                url: form_action,
                data:{name:name, email:email, password:password, gender:gender, ismarried:ismarried, address:address}
            }).done(function(data){
                $("#create-user").find("input[name='name']").val('');
                $("#create-user").find("input[name='email']").val('');
                $("#create-user").find("input[name='password']").val('');
                $("#create-user").find("input[name='gender']").val('');
                $("#create-user").find("input[name='ismarried']").val('');
                $("#create-user").find("input[name='address']").val('');
                getPageData();
                $(".modal").modal('hide');
                
                alert('Data berhasil ditambah')
            });
        }else{
            alert('Ada data yang kosong')
        }
    
    
    });
    
    /* hapus user */
    $("body").on("click",".remove-user",function(){
        var id = $(this).parent("td").data('id');
        var c_obj = $(this).parents("tr");
    
        $.ajax({
            dataType: 'json',
            type:'POST',
            url: 'api/delete.php',
            data:{id:id}
        }).done(function(data){
            c_obj.remove();
            getPageData();
            alert('Data berhasil dihapus')
        });
    
    });
    
    
    /* Edit user */
    $("body").on("click",".edit-user",function(){
    
        var id = $(this).parent("td").data('id');
        var name = $(this).parent("td").prev("td").prev("td").prev("td").prev("td").prev("td").text();
        var email = $(this).parent("td").prev("td").prev("td").prev("td").prev("td").text();
        
        var address = $(this).parent("td").prev("td").text();
        $("#edit-user").find("input[name='name']").val(name);
        $("#edit-user").find("input[name='email']").val(email);
        $("#edit-user").find("input[name='address']").val(address);
        $("#edit-user").find("input[name='id']").val(id);
    
    });
    
    
    /* Update user */
    $(".crud-edit").click(function(e){
    
        e.preventDefault();
        var form_action = $("#edit-user").find("form").attr("action");
        var name = $("#edit-user").find("input[name='name']").val();
        var email = $("#edit-user").find("input[name='email']").val();
        var password = $("#edit-user").find("input[name='password']").val();
        var gender = $("#edit-user").find("input[name='gender']:checked").val();
        var ismarried = $("#edit-user").find("input[name='ismarried']:checked").val();
        var address = $("#edit-user").find("input[name='address']").val();
        var id = $("#edit-user").find("input[name='id']").val();
    
        if(name != '' && email != '' && address != ''){
            $.ajax({
                dataType: 'json',
                type:'POST',
                url: form_action,
                data:{name:name, email:email, password:password, gender:gender, ismarried:ismarried, address:address, id:id}
            }).done(function(data){
                getPageData();
                $(".modal").modal('hide');
                alert('Data berhasil diedit')
            });
        }else{
            alert('Ada data yang kosong')
        }
    
    });
    });