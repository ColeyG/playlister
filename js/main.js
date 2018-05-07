(()=>{
    var subReal = document.getElementById('submitReal');

    function submitTrack(){
        var url = document.getElementById('url').value;
        console.log(url);
        /* start here tomorrow with an ajax req */
    }

    subReal.addEventListener("click",submitTrack,false);
})();