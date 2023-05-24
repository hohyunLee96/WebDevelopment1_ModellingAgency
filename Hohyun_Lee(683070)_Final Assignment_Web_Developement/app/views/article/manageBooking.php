<?php
include __DIR__ . '/../header.php';
?>
<?php
foreach ($booking

as $bookings) {
?>
<div id="modelTable">
        <table
        >
        <tr>
            <th>Model Name</th>
            <th>Client Name</th>
            <th>Booking Status</th>
            <th>Date</th>
            <th>Confirm</th>
            <th>Delete</th>
        </tr>
        <tr>
            <td>
                <?= $bookings->getModelName() ?>
            </td>
            <td>
                <?= $bookings->getClientName() ?>
            </td>
            <td>
                <?= $bookings->getBooking_Status() ?>
            </td>
            <td>
                <?= date("d/m/Y",strtotime($bookings->getBooking_Date()))  ?>
            </td>
            <td>
                <button type="submit" class="button1" name="confirmBooking"
                        onclick="confirmBooking(<?= $bookings->getId(); ?>)">Confirm
                </button>
            </td>
            <td>
                <button  class="button2" name="deleteBooking"
                        onclick="deleteBooking(<?= $bookings->getId(); ?>)"
                >Delete
                </button>
            </td>
        </tr>
        </table>
    <script src="/javascript/model.js"> </script>

    <?php
    }

    echo "</div>  ";
    ?>



