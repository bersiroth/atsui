<h2>Bienvenu sur le site B de nikorasu et bersiroth</h2>
       
<table class="striped alternate">
    <thead>
        <tr>    
            <th>Nom</th><th>Type</th><th>Editeur</th><th>Note</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($this->data as $data){?>
        <tr>
            <td><?php echo $data['name'] ?></td><td><?php echo $data['type'] ?></td><td><?php echo $data['editeur'] ?></td><td><?php echo $data['note'] ?></td>
        </tr>
        <?php }?>
    </tbody>
</table>