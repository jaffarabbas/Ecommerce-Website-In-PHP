<?php
include("../pages/backend/connecter.php");
session_start();
if (isset($_SESSION['admin']) && $_SESSION['admin'] != "") { 
    $result = $operations->getData(Queries::$getAllContact);
    ?>
<?php include("header.php") ?>

<h1>All Products</h1>

<table id="contactTable">
    <thead>
        <tr>
            <th>Name</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Address</th>
            <th>Message</th>
            <th>Send At</th>
            <th>Delete</th>
        </tr>
    </thead>
    <tbody>
        <?php
        foreach ($result as $value) {
            echo "<tr>";
            echo "<td>" . $value['name'] . "</td>";
            echo "<td>" . $value['email'] . "</td>";
            echo "<td>" . $value['phone'] . "</td>";
            echo "<td>" . $value['address'] . "</td>";
            echo "<td>" . $value['message'] . "</td>";
            echo "<td>" . $value['stamp'] . "</td>";
            echo "<td><a class='btnStyleDelete' href='delete_contact.php?id=" . $value['cid'] . "'>Delete</a></td>";
            echo "</tr>";
        }?>
    </tbody>
</table>

<?php include("footer.php") ?>
<?php
} else {
    Component::navigator("login.php");
}
?>