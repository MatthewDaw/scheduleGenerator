

<script>
    k = 1;
var f = document.createElement("form");
f.setAttribute('method',"post");
f.setAttribute('action',"submit.php");
f.setAttribute('id',"class"+i+"")

var i = document.createElement("input"); //input element, text
i.setAttribute('type',"text");
i.setAttribute('name',"nameOfClass"+i+"");
i.setAttribute('hidden','true');
i.setAttribute('id',"nameOfClass"+i+"");



f.appendChild(i);


document.getElementsByTagName('body')[0].appendChild(f);
    
    k++;

</script>