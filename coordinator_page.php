<!DOCTYPE html>
<html>
<head>
	<title>Coordinator Manager Page</title>
    <link rel="stylesheet" href="style_student_page.css">
</head>
<body>
	<h1>Coordinator Manager</h1>
	<br>
    <table id="myTable">
        <tr>
            <th>Title</th>
            <th>Content</th>
            <th>Status</th>
		    <th>Post Date</th>
            <th>Comment</th>
            <th>Accept/Cancel</th>
        </tr>
        <tr>
            <td>Life</td>
			<td>Business is......</td>
			<td>Not Accept</td>
			<td>29-3-2023</td>
            <td>No comment</td>
            <td><button class="delete">Accept</button></td>
        </tr>
        <tr>
            <td>I</td>
			<td>N......</td>
			<td>Not Accept</td>
			<td>29-3-2023</td>
            <td>No comment</td>
            <td><button class="delete">Accept</button></td>
        </tr>
        <tr>
            <td>A</td>
			<td>C......</td>
			<td>Not Accept</td>
			<td>29-3-2023</td>
            <td>No comment</td>
            <td><button class="delete">Accept</button></td>
        </tr>
        <tr>
            <td>C</td>
			<td>K....</td>
			<td>Not Accept</td>
			<td>29-3-2023</td>
            <td>No comment</td>
            <td><button class="delete">Accept</button></td>
        </tr>
    </table>
    <br>
    <button onclick="sortTable()" class="short">Short By Name</button>
    
    <script>
        function sortTable() {
            var table, rows, switching, i, x, y, shouldSwitch;
            table = document.getElementById("myTable");
            switching = true;
            /* Make a loop that will continue until
            no switching has been done: */
            while (switching) {
                // Start by saying: no switching is done:
                switching = false;
                rows = table.rows;
                /* Loop through all table rows (except the
                first, which contains table headers): */
                for (i = 1; i < (rows.length - 1); i++) {
                    // Start by saying there should be no switching:
                    shouldSwitch = false;
                                    /* Get the two elements you want to compare,
                one from current row and one from the next: */
                x = rows[i].getElementsByTagName("TD")[0];
                y = rows[i + 1].getElementsByTagName("TD")[0];

                /* Check if the two rows should switch place,
                based on the direction, asc or desc: */
                if (x.innerHTML.toLowerCase() > y.innerHTML.toLowerCase()) {
                    // If so, mark as a switch and break the loop:
                    shouldSwitch = true;
                    break;
                }
            }
            if (shouldSwitch) {
                /* If a switch has been marked, make the switch
                and mark that a switch has been done: */
                rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
                switching = true;
            }
        }
    }
</script>

    <br>
	<br>
</body>
</html>

