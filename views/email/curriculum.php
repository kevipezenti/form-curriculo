<table>
    <tr>
        <th colspan="2">Curriculum</th>
    </tr>
    <tr>
        <td>Nome:</td>
        <td><?=$name; ?></td>
    </tr>
    <tr>
        <td>E-mail:</td>
        <td><?=$email; ?></td>
    </tr>
    <tr>
        <td>Telefone:</td>
        <td><?=$phone;?></td>
    </tr>
    <tr>
        <td>Cargo Desejado:</td>
        <td><?=$office; ?></td>
    </tr>
    <tr>
        <td>Escolaridade:</td>
        <td><?=$schooling; ?></td>
    </tr>
    <tr>
        <td colspan="2">Observação:</td>
    </tr>
    <tr>
        <td colspan="2"><?=$note ?? '--'; ?></td>
    </tr>
    <tr>
        <td>Data</td>
        <td>Hora</td>
    </tr>
    <tr>
        <td><?=date('d/m/Y', strtotime($date)); ?></td>
        <td><?=$hour; ?></td>
    </tr>
</table>
