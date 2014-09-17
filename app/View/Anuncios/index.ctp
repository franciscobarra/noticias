<!-- File: /app/View/Anuncios/index.ctp -->
echo $this->Form->create('Anuncio');
echo $this->Form->input('titulo');
echo $this->Form->input('cuerpo');
echo $this->Form->input('fecha_publicacion');
echo $this->Form->input('fecha_vigencia');
echo $this->Form->input('longitud');
echo $this->Form->input('latitud');
echo $this->Form->end('Save Anuncio');
<h1>Anuncios DB</h1>
<p><?php echo $this->Html->link('Añadir Anuncio', array('action' => 'add')); ?></p>
<table>
    <tr>
        <th>Id</th>
        <th>titulo</th>
	<th>cuerpo</th>
        <th>fecha publicacion</th>
        <th>fecha vigencia</th>
        <th>longitud</th>
        <th>latitud</th>
    </tr>

<!-- loop de anuncios qls -->

    <?php foreach ($anuncios as $anuncio): ?>
    <tr>
        <td><?php echo $anuncio['Anuncio']['id']; ?></td>
        <td>
            <?php
                echo $this->Html->link(
                    $anuncio['Anuncio']['titulo'],
                    array('action' => 'view', $anuncio['Anuncio']['id'])
                );
            ?>
        </td>
		<td><?php echo $anuncio['Anuncio']['cuerpo']; ?></td>
                <td><?php echo $anuncio['Anuncio']['fecha_publicacion']; ?></td>
                <td><?php echo $anuncio['Anuncio']['fecha_vigencia']; ?></td>
                <td><?php echo $anuncio['Anuncio']['longitud']; ?></td>
                <td><?php echo $anuncio['Anuncio']['latitud']; ?></td>
        <td>
            <?php
                echo $this->Form->postLink(
                    'Eliminar',
                    array('action' => 'delete', $anuncio['Anuncio']['id']),
                    array('confirm' => 'Are you sure?')
                );
            ?>
            <?php
                echo $this->Html->link(
                    'Editar', array('action' => 'edit', $anuncio['Anuncio']['id'])
                );
            ?>
        </td>
    
    </tr>
    <?php endforeach; ?>

</table>