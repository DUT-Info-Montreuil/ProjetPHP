<?php
$sommeLikes = $data['sommeLikes'];
$sommeDeslikes = $data['sommeDeslikes'];

?>
<table class="table table-striped table-light" style="width:22%; border-radius: 25px !important; border-width: 5px !important;border-style: solid !important;">
    <thead>
    <tr>
        <th>Like</th>
        <th>DisLike</th>
    </tr>
    </thead>
    <tbody>
    <th>
        <a  id="Like">
            <label>
                <i class="fas fa-thumbs-up fa-2x" aria-hidden="true"></i>
                <span class="countlike"><?= $sommeLikes ?></span>
            </label>
        </a>
    </th>
    <td>
        <a id="Deslike">
            <label>
                <i class="fas fa-thumbs-down fa-2x" aria-hidden="true"></i>
                <span class="countDeslike"><?= $sommeDeslikes ?></span>
            </label>
        </a>
    </td>
    </tbody>
</table>
