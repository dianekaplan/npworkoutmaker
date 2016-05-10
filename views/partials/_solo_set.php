
<table class="table table-striped">

    <thead>
        <tr>
            <th>Time/count</th>
            <th>Name</th>
            <th>Show me</th>
        </tr>
    </thead>

    <tbody>
        <!-- Solo workouts are created in pairs of 'mixed' exercises, 
         we'll just use them one after the other (so new line for each) -->
         
        <?php foreach ($exercises as $pair): ?>
            <tr>
                <td align="left">1 minute, or do 20</td>
                </span>
                <td align="left"><a href="#" title= '<?= $pair[0][0]["description"] ?>' ><?= $pair[0][0]["name"] ?></a></td>
                <td align="left"> <?php if (isset($pair[0][0]["media_link"])): 
                render_partial("/partials/_media_link.php", ["media" => $pair[0][0]["media_link"]]);
                 endif ?>
                </td>
            </tr>
    

            <tr>
                <td align="left">1 minute, or do 20</td>
                <td align="left"><a href="#" title= '<?= $pair[1][0]["description"] ?>' ><?= $pair[1][0]["name"] ?></a></td>
                <td align="left"> <?php if (isset($pair[1][0]["media_link"])): 
                    render_partial("/partials/_media_link.php", ["media" => $pair[1][0]["media_link"]]);
                     endif ?>
                </td>
            </tr>
           
        <?php endforeach ?>
    </tbody>
    
</table>
