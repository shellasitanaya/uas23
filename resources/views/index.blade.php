@extends('template.indextemplate')

@section('content')
    <div class="container-fluid p-3">
        <div class="container-fluid border p-2">
            <h1 class="mb-5">Cek Pengiriman</h1>
            <div class="container-fluid d-flex flex-row gap-2 p-0">
                <input id="resi" type="text" class="ps-2" placeholder="Nomor Pengiriman">
                <button type="button" onclick="ajax()" class="btn btn-dark">Lihat</button>
            </div>
            <table class="table mt-3">
                <thead class="table-dark">
                    <tr>
                        <th scope="col">Tanggal</th>
                        <th scope="col">Kota</th>
                        <th scope="col">Keterangan</th>
                    </tr>
                </thead>
                <tbody id="table-body">

                </tbody>
            </table>
        </div>
    </div>
@endsection

@section('script')
    <script>
        function ajax() {
            const resi = document.getElementById("resi").value;
            fetch("{{ route('resi.search') }}", {
                    method: "POST",
                    headers: {
                        "Content-Type": "application/json",
                        "X-CSRF-TOKEN": `{{ csrf_token() }}`
                    },
                    // key:value, 'resi' nya dari const
                    body: JSON.stringify({
                        nomor_resi: resi
                    })
                })
                .then(response => response.json())
                .then(result => {
                    console.log(result);
                    // console.log(result.data.detail_log_relation);

                    const tableBody = document.getElementById("table-body");
                    tableBody.innerHTML = ""; 
                    
                    if (result.success) {
                        result.data.detail_log_relation.forEach((item) => {
                            const row = `
                                <tr>
                                    <td>${result.data.tanggal}</td>
                                    <td>${item.kota}</td>
                                    <td>${item.keterangan}</td>
                                </tr>
                            `;
                            tableBody.innerHTML += row;
                        });
                    } else {
                        const row = `
                            <tr>
                                <td colspan="3" class="text-center">No data found</td>
                            </tr>
                        `;
                        tableBody.innerHTML += row;
                    }
                })
                .catch(error => {
                    console.error("Error:", error);
                    alert("An error occurred while fetching the data.");
                });
        }


        // function ajax(){
        //     const resi = document.getElementById("resi").value;
        //     $.ajax({
        //         url: '../function/view-resi-spesifik.php',
        //         type: 'GET',
        //         data: { resi: resi },
        //         dataType: 'json',
        //         success: function(data) {
        //             // Handle the returned data
        //             let resultHtml = '';
        //             if (data.length > 0) {
        //                 data.forEach(function(row) {
        //                     resultHtml += `<tr>
    //                                         <td>${row.tanggal}</td>
    //                                         <td>${row.kota}</td>
    //                                         <td>${row.keterangan}</td>
    //                                     </tr>`;
        //                 });
        //             } else {
        //                 resultHtml = '<p>No data found.</p>';
        //             }
        //             $('#table-body').html(resultHtml);
        //         },
        //         error: function(xhr, status, error) {
        //             console.error('AJAX Error: ' + status + ', ' + error);
        //             $('#result').html('<p>Error loading data.</p>');
        //         }
        //     });
        // }
    </script>
@endsection
