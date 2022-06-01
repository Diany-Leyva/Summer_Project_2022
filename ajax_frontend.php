


<script type='text/javascript'>

   function getCurrentTime(){
       fetch("ajax_endpoint.php")
            .then(response => response.text())
            .then(data => document.GetElementById('currentTime').innerHTML = data);
        console.log("We are here");
    }


</script>

<input type='button' onClick = "getCurrentTime()" value = 'get time' />

<p id='currentTime'>

</p>