Repeat circuit for 6 minutes (or duration you like)
<table class="table table-striped">

<!-- Partner workouts get double columns (one for each partner) -->
    
    <thead>
        <tr>
            <!-- Partner workouts get double columns (one for each partner) -->
            <th>Partner 1 does:</th>
            <th>Show me</th>
            <th>Partner 2 does:</th>
            <th>Show me</th>
        </tr>
    </thead>

    <tbody>
        <!-- Show exercise name (& description hover), media_link if it has one -->
        <?php foreach ($exercises as $pair): ?>
        <tr>
            <td class="left"><a title= '<?= $pair[0][0]["description"] ?>'><?= $pair[0][0]["name"] ?></a></td>
            
            <td class="left"> <?php if (isset($pair[0][0]["media_link"])): 
            render_partial("/partials/_media_link.php", ["media" => $pair[0][0]["media_link"]]);
             endif ?>
            </td>
            
            <!-- Mixed pairs will have concurrent exercise for partner #2, show same stuff -->          
            <?php if (isset($pair[1]) ): ?>
            <td class="left"><a title= '<?= $pair[1][0]["description"] ?>' ><?= $pair[1][0]["name"] ?></a></td>
            <td class="left"> <?php if (isset($pair[1][0]["media_link"])): 
            render_partial("/partials/_media_link.php", ["media" => $pair[1][0]["media_link"]]);
             endif ?>
            </td>
            
            <?php else :?>
            <td>(both partners do this one together)</td>
            <td></td>
            <?php endif ?>
        </tr>
        <?php endforeach ?>
    </tbody>
</table>

