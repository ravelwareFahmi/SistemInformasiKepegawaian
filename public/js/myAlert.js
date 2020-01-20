const flashData = $('.flash-data').data('flashdata');
// console.log(flashData);

if (flashData) {
    Swal.fire({
        title: 'Sukses',
        text: flashData,
        icon: 'success'
    });
}

$('.hapusData').on('click', function(event){
    // matikan event sementara
    event.preventDefault();

    const href = $(this).attr('href');

    Swal.fire({
        title: 'Apakah anda yakin',
        text: 'Data akan dihapus',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Hapus Data!!'
    }).then((result)=>{
        // jika tombol di klik
        if(result.value){
            document.location.href = href
        }
    })
});

// config datePicker
$(document).ready(function(){
    setDatePicker()
    // setDateRangePicker(".startdate", ".enddate")
    // setMonthPicker()
    // setYearPicker()
    // setYearRangePicker(".startyear", ".endyear")
});

// config dataTable
$(document).ready(function(){
    $('#myTable').DataTable();
    // "order": [[ "desc" ]]
});


