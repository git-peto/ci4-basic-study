<table class="table table-bordered">
  <tbody>
    <tr>
      <th width="30%">ID</th>
      <td><?= $item["id"] ?></td>
    </tr>
    <tr>
      <th width="30%">Name</th>
      <td><?= $item["name"] ?></td>
    </tr>
    <tr>
      <th width="30%">Unit</th>
      <td><?= $item["unit"] ?></td>
    </tr>
    <tr>
      <th width="30%">Price</th>
      <td><?= $item["price"] ?></td>
    </tr>
    <tr>
      <td colspan=2>
        <img src="/assets/images/<?= $item['image_name'] ?>" alt="Image for <?= $item['name'] ?>" width="100%"/>
      </td>
    </tr>
  </tbody>
</table>