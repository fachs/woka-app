function showService() {
    $('#service-list').html('');

   $.ajax({
        url: 'http://localhost/rest-api/wokaRest-server/api/service',
        type: 'get',
        dataType: 'json',
        data: {
            'iKey' : 'irest123'
        },
        success: function (result) {
            let services = result.data;

            $.each(services, function (i, serv) {
                   $('#service-list').append(`
                   <div class="col-md-4 ms-2" style="width: 23rem;">
                        <div class="card mb-4">
                            <img src="img/${serv.pic_1}" class="card-img-top see-detail" data-bs-toggle="modal" data-bs-target="#exampleModal" data-id="${serv.id}" style="cursor: pointer; height: 191px;">
                            <div class="card-body">
            
                            <div class="card-body">
                            <div class="row">
                                <div class="col-lg-3">
                                    <img src="img/profile.PNG" class="rounded-circle" width="50px" alt="">
                                </div>
                                <div class="col-lg">
                                    <a href="#" class="card-title" style="font-size: 15px; color: black;">${serv.worker_fname} ${serv.worker_lname}</a>
                                    <p style="color: red;">${serv.worker_address}</p>
                                </div>
                            </div>
                            <p class="card-text">
            
                            </p>
                        </div>

                        <div class="row">
                            <div class="col-lg col-sm-12 thumb-post">
                                <p>
                                    ${serv.nama}
                                </p>
                            </div>
                        </div>

                        <ul class="list-group list-group-flush">
                            <li class="list-group-item" style="text-align: center;">Mulai dari Rp ${serv.harga_pil_1}</li>
                            <li class="list-group-item" style="text-align: center;"><a href="#" class="btn btn-primary see-detail" data-bs-toggle="modal" data-bs-target="#exampleModal" data-id="${serv.id}">Pesan Sekarang</a></li>
                        </ul>
                        
                        </div>
                        </div>
                    </div>
                   `); 
            });
        }
   });
}

showService();

function searchService() {
    $('#service-list').html('');

   $.ajax({
        url: 'http://localhost/rest-api/wokaRest-server/api/service',
        type: 'get',
        dataType: 'json',
        data: {
            'iKey' : 'irest123',
            'keyword' : $('#search-input').val()
        },
        success: function (result) {
            let services = result.data;
                
                $.each(services, function (i, serv) {
                    $('#service-list').append(`
                    <div class="col-md-4 ms-2" style="width: 23rem;">
                    <div class="card mb-4">
                        <img src="img/${serv.pic_1}" class="card-img-top see-detail" data-bs-toggle="modal" data-bs-target="#exampleModal" style="cursor: pointer; height: 191px;">
                        <div class="card-body">
        
                        <div class="card-body">
                        <div class="row">
                            <div class="col-lg-3">
                                <img src="img/profile.PNG" class="rounded-circle" width="50px" alt="">
                            </div>
                            <div class="col-lg">
                                <a href="#" class="card-title" style="font-size: 15px; color: black;">${serv.worker_fname} ${serv.worker_lname}</a>
                                <p style="color: red;">${serv.worker_address}</p>
                            </div>
                        </div>
                        <p class="card-text">
        
                        </p>
                    </div>
        
                    <div class="row">
                        <div class="col-lg col-sm-12 thumb-post">
                            <p>
                             ${serv.nama}
                            </p>
                        </div>
                    </div>
                    
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item" style="text-align: center;">Mulai dari Rp ${serv.harga_pil_1}</li>
                        <li class="list-group-item" style="text-align: center;"><a href="#" class="btn btn-primary see-detail" data-bs-toggle="modal" data-bs-target="#exampleModal" data-id="${serv.id}">Pesan Sekarang</a></li>
                    </ul>
                    
                    </div>
                    </div>
                </div>
                    `); 
                });

                $('#search-input').val('');
        }
   });
}

$('#search-button').on('click', function () {
    searchService();
});


$('#service-list').on('click', '.see-detail', function () {
    
    $.ajax({
        url: 'http://localhost/rest-api/wokaRest-server/api/service',
        type: 'get',
        dataType: 'json',
        data: {
            'iKey' : 'irest123',
            'id' : $(this).data('id')
        },
        success: function(result) {
            let services = result.data;

            $.each(services, function (i, serv) {
                $('.modal-body').html(`
                <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-8 col-sm-12 thumb-post">
                        <img src="img/${serv.pic_1}" class="rounded" width="100%" alt="">
                    </div>
                    <div class="col-lg col-sm-12">
                        <form method="post" action="/order">
                        
                        <b>Pilih jasa</b>
                        <div class="box mt-3">
                            <select class="form-select" aria-label="Default select example">
                                <option value="${serv.nama_pil1}" selected>${serv.nama_pil1}</option>
                                <option value="${serv.nama_pil2}">${serv.nama_pil2}</option>
                                <option value="${serv.nama_pil3}">${serv.nama_pil3}</option>
                            </select>
                            <br>
                            <p>Harga <span class="float-end">Rp ${serv.harga_pil_1}</span></p>
                            <hr>
                            <p class="mt-2">Biaya tambahan</p>
                            <div class="box">
                                Rp.0
                            </div>
                            <br>
                            <p>Total <span class="float-end">Rp ${serv.harga_pil_1}</span></p>
                            
                                <input type="text" class="form-control" id="service_id" name="service_id" value="${serv.id}" hidden>
                                <input type="text" class="form-control" id="worker_id" name="worker_id" value="${serv.worker_id}" hidden>
                                <button type="submit" class="btn btn-pesan mt-3 flex">Pesan Jasa</button>
                            
                        </div>
                        </form>
                    </div>
                </div>
                <div class="row mt-4">
                    <div class="col-lg col-sm-12 thumb-post">
                        <p>
                            <span style="color: #40B2C9;">${serv.kategori}</span><br>
                            <b>${serv.nama}</b>
                        </p>
                    </div>
            
                </div>
                <div class="row mt-4">
                    <div class="col-lg-8 col-sm-12">
                        <p style="text-align: justify;">${serv.description}</p>
                    </div>
                </div>
            </div>
                `);
                
                $('.workerModal').html(`
                        <a href="#" class="card-title" style="font-size: 15px; color: black;" id="namaWorker">${serv.worker_fname} ${serv.worker_lname}</a>
						<p style="color: red;" id="kotaWorker">${serv.worker_address}</p>
                `);
            });
        }
    });
});
