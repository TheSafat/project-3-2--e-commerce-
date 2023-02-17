
<table>
    <tr>
        <td>Name</td>
        <td><img height="100px" src="../user_area/upload/<?php echo $row['img'] ?>" alt=""></td>
    </tr>
    <tr>
        <td>Email</td>
        <td><?php echo $row['email'] ?></td>
    </tr>
    <tr>
        <td>Phone</td>
        <td><?php echo $row['phone'] ?></td>
    </tr>
    <tr>
        <td>Address</td>
        <td><?php echo $row['address'] ?></td>
    </tr>
    <tr>
        <td>Password</td>
        <td><?php echo $row['password'] ?></td>
    </tr>
    <tr>
        <td></td>
        <td><a href="user_update.php?status=edit&&id=<?php echo $row['id'] ?>">Edit profile</a></td>
    </tr>
    
</table>