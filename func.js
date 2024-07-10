$(document).ready(function(){
    $('#myForm').submit(function(e){
        e.preventDefault(); 

        if (this.checkValidity()) {
            var formData = {
                fullname: $('input[name="fullname"]').val(),
                address: $('input[name="address"]').val(),
                phone: $('input[name="phone"]').val(),
                email: $('input[name="email"]').val()
            };

            $.ajax({
                type: 'POST',
                url: 'data.php', 
                data: formData,
                success: function(response){
                    displayFormData(formData); 
                    refreshTable();
                    alert('Ваши данные были успешно сохранены!');
                },
                error: function(){
                    alert('Ошибка при сохранении данных');
                }
            });
        }
    });
    function displayFormData(formData) {
        var display = 'Полное имя: ' + formData.fullname + '<br>' +
                      'Адрес: ' + formData.address + '<br>' +
                      'Телефон: ' + formData.phone + '<br>' +
                      'Эл. почта: ' + formData.email + '<br>';

        $('#form-data-display').html(display);
    }
});