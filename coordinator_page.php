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
            <th>Topic Id</th>
            <th>Topic Name</th>
            <th>Start Date</th>
		    <th>End Date</th>
            <th></th>
            <th></th>
        </tr>
        <tr>
            <td>Abkfd57B</td>
			<td>Business</td>
			<td>7-7-2022</td>
			<td>29-3-2023</td>
            <td><button class="add">Accept</button></td>
            <td><button class="delete">Cancel</button></td>
        </tr>
        <tr>
            <td>Ffkd45s3</td>
			<td>Analyze</td>
			<td>7-7-2022</td>
			<td>29-3-2023</td>
            <td><button class="add">Accept</button></td>
            <td><button class="delete">Cancel</button></td>
        </tr>
        <tr>
            <td>Dbkfd57B</td>
			<td>Evaluation</td>
			<td>7-7-2022</td>
			<td>29-3-2023</td>
            <td><button class="add">Accept</button></td>
            <td><button class="delete">Cancel</button></td>
        </tr>
    </table>
    <br>
    <button onclick="sortTable()" class="short">Short By Name</button>
    <h1>Topic Available</h1>
    <table>
        <tr>
            <th>Topic Id</th>
            <th>Topic Name</th>
            <th>Start Date</th>
			<th>End Date</th>
        </tr>
        <tr>
            <td>6Dmakf7re</td>
			<td>WEB</td>
			<td>26-7-2022</td>
			<td>29-9-2022</td>
        </tr>
        <tr>
            <td>6Dmakf7re</td>
			<td>AI</td>
			<td>26-7-2022</td>
			<td>29-9-2022</td>
        </tr>
    </table>

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
                x = rows[i].getElementsByTagName("TD")[1];
                y = rows[i + 1].getElementsByTagName("TD")[1];

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

