//m/d/Y EJEMPLO: 02/28/2024 06:00 PM
var end = new Date('03/24/2025 06:00 PM');
    var _second = 1000;
    var _minute = _second * 60;
    var _hour = _minute * 60;
    var _day = _hour * 24;
    var timer;

    function showRemaining() {
        var now = new Date();
        var distance = end - now;
        if (distance < 0) {
            clearInterval(timer);
            window.location="index_cierre.php";
            return;
        } 
        var days = Math.floor(distance / _day);
        var hours = Math.floor((distance % _day) / _hour);
        var minutes = Math.floor((distance % _hour) / _minute);
        var seconds = Math.floor((distance % _minute) / _second);

        /*si se vean ok este codigo, lo voy activar para la alerta amarilla para el cierre 
            de la convocatoria 2023 */
        document.getElementById('countdown').innerHTML = '<strong>¡Aviso! </strong>Estimado usuario, el registro de proyectos a la plataforma PROFEST 2025 concluirá en<strong> ' + hours + ' horas, ' + minutes + ' minutos y </strong>';  
       document.getElementById('countdown').innerHTML += '<strong>' + seconds + ' segundos</strong>.';

	}
    timer = setInterval(showRemaining, 1000);