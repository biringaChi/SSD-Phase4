<!-- A simulated Course Search HTML Page to test defense strategies -->
<html>
	<head>
		<title> Course Search Simulated Page</title>
	</head>
	<body>
    <div id="wrapper">

        <main>
            <!--Heading-->
            <h1>Course Search Simulated Page</h1>
            <div class=horizontal_line>
                <hr>
            </div>

            <br><br>

            <!--Search filters-->
            <div style="text-align:center">
                <div class = "search_pane">
                    <h1>Input Fields</h1>
                    <div class=horizontal_line>
                        <hr>
                    </div>

                    <form action="security_context.php" method="post">
                        <table>
                            <tbody>
                            <tr>
                                <!--Semester field-->
                                <td class="search_filter">
                                    <label class="search_filter">
                                        Semester:
                                    </label>
                                </td>

                                <td class="search_filter_input">
                                    <input type="text" id="semester" name="semester">
                                </td>

                                <!--Department field-->
                                <td class="search_filter">
                                    <label class="search_filter">
                                        Department:
                                    </label>
                                </td>

                                <td class="search_filter_input">
                                    <input type="text" id="department" name="department">
                                </td>
                            </tr>

                            <tr>
                                <!--Course Name Field-->
                                <td class="search_filter">
                                    <label class="search_filter">
                                        Course Name:
                                    </label>
                                </td>
                                <td class="search_filter_input">
                                    <input type="text" id="coursename" name="coursename"/>
                                </td>

                                <!--Course ID Field-->
                                <td class="search_filter">
                                    <label class="search_filter">
                                        Course ID:
                                    </label>
                                </td>
                                <td>
                                    <input type="text" id="courseid" name="courseid">
                                </td>
                            </tr>
                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td style="text-align: right">
                                    <button class="button_large" type="submit">
                                        Search
                                    </button></td>
                            </tr>
                            </tbody>
                        </table>
                    </form>
                </div>
                <!--End of Search filters-->

	</body>
</html>