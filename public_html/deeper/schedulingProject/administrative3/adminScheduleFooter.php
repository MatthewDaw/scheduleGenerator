
    <!-- jQuery first, then Bootstrap JS. -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.2/js/bootstrap.min.js" integrity="sha384-vZ2WRJMwsjRMW/8U7i6PWi6AlO1L79snBrmgiDpgIWJ82z8eA5lenwvxbMV1PAh7" crossorigin="anonymous"></script>
      
      <script type="text/javascript">

        var scheduleArray = <?php echo json_encode($scheduleArray); ?>;
        
        for(var i = 0; i < scheduleArray.length; i++)
            {
                //tableName = str_replace(' ', '*', scheduleArray[i]);
        var newTableData = $("<td class='scheduleLinks'><div class='scheduleLinkDiv'><table class='innerScheduleDivTable'><tr><td><span class='scheduleDivHead'>"+scheduleArray[i]+"</span></td></tr><tr><td><form method='post'><input  name='schedOpen' value='"+scheduleArray[i]+"' hidden><input type='submit' value='open' id='"+scheduleArray[i]+"' class='tempClass'></form></td></tr><tr><td><form method='post'><input  name='schedClose' value='"+scheduleArray[i]+"' class='tempClass2' hidden><input id='"+scheduleArray[i]+"close' type='submit' value='close' class='tempClass'></td></tr></form></table></div></td>");
        
                
          $("#scheduleArray").append(newTableData);
                
            }
          
          
          $('.tempClass2').value = '';
          $('.tempClass').value = '';
          
        var increaseSize = (((Math.ceil(scheduleArray.length / 8)-1)*220)+500);
          console.log(increaseSize);
          
        $('#loggedInContent').css('height',increaseSize);
    

          

          
    </script>
      </body>
</html>
