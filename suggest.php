<div></div>
<script src="vendor/jquery/jquery.min.js"></script>
<script>
    function GetDesc(){
        $.post("admin/apriori.php",function(data){
            var data = getSuggest(data);
            $("div").text(data);
        });
    }
    GetDesc();
    function getSuggest(data){
        var str = "";
        var id = 9;
        var ob = JSON.parse(data);
        for(i=0;i<ob.length;i++){
            if(ob[i].search(3)!=-1){
                str = ob[i]+", "+str;
            }
        }
        str = str.split(", ");
        var data2 = [];
        var x = 0;
        for(i=0;i<data.length;i++){
            if(data2.length==0){
                data2[x] = str[0];
            }
            for(j=0;j<data2.length;j++){
                if(data2[j]==str[i]){
                    break;
                }
            }
            if(data2.length==j){
                data2[x++] = str[i];
            }
        }
        var data3 = [];
       for(i=0;i<data2.length-2;i++){
        data3[i] = data2[i];
       }
        return data3;
    }
</script>