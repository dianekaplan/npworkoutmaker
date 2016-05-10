
<table class="table table-striped">
    
        <div class="right"><a href="#" onclick="window.print();return false;">Print exercise list</a></div>
        
        <div id="content" class="print">

            <thead>
                <tr>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Show me</th>
                </tr>
            </thead>
        
            <tbody>
        
                <?php foreach ($exercises as $exercise): ?>
                <tr>
                    <td align="left"><?= $exercise["name"] ?></td>
                    <td align="left"><?= $exercise["description"] ?></td>
                    <td align="left"> <?php if (isset($exercise["media_link"])) : 
                        render_partial("/partials/_media_link.php", ["media" =>$exercise["media_link"] ]);
                    endif ?>
                    </td>
                </tr>
                <?php endforeach ?>
        
            </tbody>
        </div>
        
</table>


