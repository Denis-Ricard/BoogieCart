<h2><img src="images/icons/tools_32.png" alt="Manage Users" />Manage Users</h2>

    <div class="notification information">
            This is an informative notification. Click me to hide me.
    </div>
    
    <div class="content-box closed column-left sidebar"><!-- use the class .sidebar in combination with .column-left to create a sidebar --><!-- using .closed makes sure the content box is closed by default -->
            <div class="content-box-header">
                    <h3>Closed Sidebar</h3>
            </div>
            
            <div class="content-box-content">
                    <p>This content box uses 1/3rd of the total width.</p>
                    <p>The total width can be easily adjusted in main.css.</p>
            </div>
    </div>
    
    <div class="content-box column-right main">
            <div class="content-box-header">
                    <h3>Statistics</h3>
                    
                    <!-- You can create tabs with unordered lists -->
                    <ul>						
                            <li>
                                    <a href="#bar">Bar chart</a>
                            </li>
                                                                            
                            <li>
                                    <a href="#area">Area chart</a>
                            </li>
                    </ul>
            </div>
            
            <div class="content-box-content">												
                    <div class="tab-content" id="bar">
                            <table class="bargraph">
                                    <caption>Statistics</caption>
                                    <thead>
                                            <tr>
                                                    <td></td>
                                                    <th scope="col">Jan</th>
                                                    <th scope="col">Feb</th>
                                                    <th scope="col">Mar</th>
                                                    <th scope="col">Apr</th>
                                                    <th scope="col">May</th>
                                                    <th scope="col">Jun</th>
                                                    <th scope="col">Jul</th>
                                                    <th scope="col">Aug</th>
                                                    <th scope="col">Sep</th>
                                                    <th scope="col">Oct</th>
                                                    <th scope="col">Nov</th>
                                                    <th scope="col">Dec</th>
                                            </tr>
                                    </thead>

                                    <tbody>
                                            <tr>
                                                    <th scope="row">Pageviews</th>
                                                    <td>40</td>
                                                    <td>50</td>
                                                    <td>88</td>
                                                    <td>80</td>
                                                    <td>125</td>
                                                    <td>45</td>
                                                    <td>34</td>
                                                    <td>87</td>
                                                    <td>94</td>
                                                    <td>115</td>
                                                    <td>86</td>
                                                    <td>54</td>
                                            </tr>
                                    
                                            <tr>
                                                    <th scope="row">Unique visitors</th>
                                                    <td>20</td>
                                                    <td>40</td>
                                                    <td>68</td>
                                                    <td>70</td>
                                                    <td>102</td>
                                                    <td>35</td>
                                                    <td>14</td>
                                                    <td>17</td>
                                                    <td>74</td>
                                                    <td>95</td>
                                                    <td>45</td>
                                                    <td>23</td>
                                            </tr>
                                    </tbody>
                            </table>
                    </div><!-- end .tab-content -->
                    
                    <div class="tab-content" id="area">
                            <table class="areagraph">
                                    <caption>Statistics</caption>
                                    <thead>
                                            <tr>
                                                    <td></td>
                                                    <th scope="col">Jan</th>
                                                    <th scope="col">Feb</th>
                                                    <th scope="col">Mar</th>
                                                    <th scope="col">Apr</th>
                                                    <th scope="col">May</th>
                                                    <th scope="col">Jun</th>
                                                    <th scope="col">Jul</th>
                                                    <th scope="col">Aug</th>
                                                    <th scope="col">Sep</th>
                                                    <th scope="col">Oct</th>
                                                    <th scope="col">Nov</th>
                                                    <th scope="col">Dec</th>
                                            </tr>
                                    </thead>

                                    <tbody>
                                            <tr>
                                                    <th scope="row">Pageviews</th>
                                                    <td>40</td>
                                                    <td>50</td>
                                                    <td>88</td>
                                                    <td>80</td>
                                                    <td>125</td>
                                                    <td>45</td>
                                                    <td>34</td>
                                                    <td>87</td>
                                                    <td>94</td>
                                                    <td>115</td>
                                                    <td>86</td>
                                                    <td>54</td>
                                            </tr>
                                    
                                            <tr>
                                                    <th scope="row">Unique visitors</th>
                                                    <td>20</td>
                                                    <td>40</td>
                                                    <td>68</td>
                                                    <td>70</td>
                                                    <td>102</td>
                                                    <td>35</td>
                                                    <td>14</td>
                                                    <td>17</td>
                                                    <td>74</td>
                                                    <td>95</td>
                                                    <td>45</td>
                                                    <td>23</td>
                                            </tr>
                                    </tbody>
                            </table>
                    </div><!-- end .tab-content -->
            </div><!-- end .content-box-content -->
    </div>
    
    <div class="clear"></div>
                            
    <div class="content-box column-left main">
            <div class="content-box-header">
                    <h3>Users</h3>
            </div><!-- end .content-box-header -->
            
            <div class="content-box-content">
                    <table class="pagination" rel="5"><!-- add the class .pagination to dynamically create a working pagination! The rel-attribute will tell how many items there are per page -->
                            <thead>
                                    <tr>
                                            <th><input type="checkbox" /></th>
                                            <th>Username</th>
                                            <th>Last login</th>
                                            <th>Actions</th>
                                    </tr>
                            </thead>
                            
                            <tfoot>
                                    <tr>
                                            <td colspan="4">			
                                                    <div class="bulk-actions">
                                                            <select>
                                                                    <option value="option1">Choose an action...</option>
                                                                    <option value="option2">Delete</option>
                                                                    <option value="option3">Move to authors</option>
                                                            </select>
                                                            <a href="#" class="graybutton">Apply to selected</a>
                                                    </div>
                                            </td>
                                    </tr>
                            </tfoot>
                                            
                            <tbody>
                                            
                                    <tr>
                                            <td><input type="checkbox" /></td>
                                            <td><a href="#">Admin</a></td>
                                            <td>4th of May 2010 - 9:31</td>
                                            <td>
                                                    <a href="#"><img src="images/icons/pencil.png" alt="Edit" /></a>
                                                    <a href="#" class="confirmation"><img src="images/icons/cross.png" alt="Delete" /></a><!-- to create a tooltip-style confirmation, just add .confirmation to the <a>-tag -->
                                            </td>
                                    </tr>
                                                    
                                    <tr>
                                            <td><input type="checkbox" /></td>
                                            <td><a href="#">Bram</a></td>
                                            <td>4th of May 2010 - 9:31</td>
                                            <td>
                                                    <a href="#"><img src="images/icons/pencil.png" alt="Edit" /></a>
                                                    <a href="#" class="confirmation"><img src="images/icons/cross.png" alt="Delete" /></a>
                                            </td>									
                                    </tr>
                                            
                                    <tr>
                                            <td><input type="checkbox" /></td>
                                            <td><a href="#">Teun</a></td>
                                            <td>4th of May 2010 - 9:31</td>
                                            <td>
                                                    <a href="#"><img src="images/icons/pencil.png" alt="Edit" /></a>
                                                    <a href="#" class="confirmation"><img src="images/icons/cross.png" alt="Delete" /></a>
                                            </td>									
                                    </tr>
                                            
                                    <tr>
                                            <td><input type="checkbox" /></td>
                                            <td><a href="#">Henk</a></td>
                                            <td>4th of May 2010 - 9:31</td>
                                            <td>
                                                    <a href="#"><img src="images/icons/pencil.png" alt="Edit" /></a>
                                                    <a href="#" class="confirmation"><img src="images/icons/cross.png" alt="Delete" /></a>
                                            </td>									
                                    </tr>
                                            
                                    <tr>
                                            <td><input type="checkbox" /></td>
                                            <td><a href="#">Jan-peter</a></td>
                                            <td>4th of May 2010 - 9:31</td>
                                            <td>
                                                    <a href="#"><img src="images/icons/pencil.png" alt="Edit" /></a>
                                                    <a href="#" class="confirmation"><img src="images/icons/cross.png" alt="Delete" /></a>
                                            </td>									
                                    </tr>
                                                    
                                    <tr>
                                            <td><input type="checkbox" /></td>
                                            <td><a href="#">Wouter</a></td>
                                            <td>4th of May 2010 - 9:31</td>
                                            <td>
                                                    <a href="#"><img src="images/icons/pencil.png" alt="Edit" /></a>
                                                    <a href="#" class="confirmation"><img src="images/icons/cross.png" alt="Delete" /></a>
                                            </td>									
                                    </tr>
                                    
                                    <tr>
                                            <td><input type="checkbox" /></td>
                                            <td><a href="#">Admin</a></td>
                                            <td>4th of May 2010 - 9:31</td>
                                            <td>
                                                    <a href="#"><img src="images/icons/pencil.png" alt="Edit" /></a>
                                                    <a href="#" class="confirmation"><img src="images/icons/cross.png" alt="Delete" /></a>
                                            </td>
                                    </tr>
                                                    
                                    <tr>
                                            <td><input type="checkbox" /></td>
                                            <td><a href="#">Bram</a></td>
                                            <td>4th of May 2010 - 9:31</td>
                                            <td>
                                                    <a href="#"><img src="images/icons/pencil.png" alt="Edit" /></a>
                                                    <a href="#" class="confirmation"><img src="images/icons/cross.png" alt="Delete" /></a>
                                            </td>									
                                    </tr>
                                            
                                    <tr>
                                            <td><input type="checkbox" /></td>
                                            <td><a href="#">Teun</a></td>
                                            <td>4th of May 2010 - 9:31</td>
                                            <td>
                                                    <a href="#"><img src="images/icons/pencil.png" alt="Edit" /></a>
                                                    <a href="#" class="confirmation"><img src="images/icons/cross.png" alt="Delete" /></a>
                                            </td>									
                                    </tr>
                                            
                                    <tr>
                                            <td><input type="checkbox" /></td>
                                            <td><a href="#">Henk</a></td>
                                            <td>4th of May 2010 - 9:31</td>
                                            <td>
                                                    <a href="#"><img src="images/icons/pencil.png" alt="Edit" /></a>
                                                    <a href="#" class="confirmation"><img src="images/icons/cross.png" alt="Delete" /></a>
                                            </td>									
                                    </tr>
                                            
                                    <tr>
                                            <td><input type="checkbox" /></td>
                                            <td><a href="#">Jan-peter</a></td>
                                            <td>4th of May 2010 - 9:31</td>
                                            <td>
                                                    <a href="#"><img src="images/icons/pencil.png" alt="Edit" /></a>
                                                    <a href="#" class="confirmation"><img src="images/icons/cross.png" alt="Delete" /></a>
                                            </td>									
                                    </tr>
                                    
                                    <tr>
                                            <td><input type="checkbox" /></td>
                                            <td><a href="#">Teun</a></td>
                                            <td>4th of May 2010 - 9:31</td>
                                            <td>
                                                    <a href="#"><img src="images/icons/pencil.png" alt="Edit" /></a>
                                                    <a href="#" class="confirmation"><img src="images/icons/cross.png" alt="Delete" /></a>
                                            </td>									
                                    </tr>
                                            
                                    <tr>
                                            <td><input type="checkbox" /></td>
                                            <td><a href="#">Henk</a></td>
                                            <td>4th of May 2010 - 9:31</td>
                                            <td>
                                                    <a href="#"><img src="images/icons/pencil.png" alt="Edit" /></a>
                                                    <a href="#" class="confirmation"><img src="images/icons/cross.png" alt="Delete" /></a>
                                            </td>									
                                    </tr>
                                            
                                    <tr>
                                            <td><input type="checkbox" /></td>
                                            <td><a href="#">Jan-peter</a></td>
                                            <td>4th of May 2010 - 9:31</td>
                                            <td>
                                                    <a href="#"><img src="images/icons/pencil.png" alt="Edit" /></a>
                                                    <a href="#" class="confirmation"><img src="images/icons/cross.png" alt="Delete" /></a>
                                            </td>									
                                    </tr>
                                    
                                    <tr>
                                            <td><input type="checkbox" /></td>
                                            <td><a href="#">Teun</a></td>
                                            <td>4th of May 2010 - 9:31</td>
                                            <td>
                                                    <a href="#"><img src="images/icons/pencil.png" alt="Edit" /></a>
                                                    <a href="#" class="confirmation"><img src="images/icons/cross.png" alt="Delete" /></a>
                                            </td>									
                                    </tr>
                                            
                                    <tr>
                                            <td><input type="checkbox" /></td>
                                            <td><a href="#">Henk</a></td>
                                            <td>4th of May 2010 - 9:31</td>
                                            <td>
                                                    <a href="#"><img src="images/icons/pencil.png" alt="Edit" /></a>
                                                    <a href="#" class="confirmation"><img src="images/icons/cross.png" alt="Delete" /></a>
                                            </td>									
                                    </tr>
                                            
                                    <tr>
                                            <td><input type="checkbox" /></td>
                                            <td><a href="#">Jan-peter</a></td>
                                            <td>4th of May 2010 - 9:31</td>
                                            <td>
                                                    <a href="#"><img src="images/icons/pencil.png" alt="Edit" /></a>
                                                    <a href="#" class="confirmation"><img src="images/icons/cross.png" alt="Delete" /></a>
                                            </td>									
                                    </tr>
                                    
                            </tbody>
                    </table>
                    
            </div><!-- end .content-box-content -->
            
    </div><!-- end .content-box -->
    
    <div class="content-box column-right sidebar">
            <div class="content-box-header">
                    <h3>Sidebar</h3>
            </div>
            
            <div class="content-box-content">
                    <p>This theme features lots of nifty little effects. Try deleting a row from the table for instance.</p>
                    <p>Everything in this theme is very modular and can be combined in any way.</p>
                    <small>Hint: Don't forget to check your messages!</small>
            </div>
    </div>
    
    <div class="clear"></div>
    
    <div class="content-box">
            <div class="content-box-header">
                    <h3>Form</h3>
            </div>
            
            <div class="content-box-content">
                    <form action="">
                            <fieldset>
                                    <p>
                                            <label>Username</label>
                                            <input id="username" type="text" class="small" /><!-- add .align-right to align the input elements to the right -->
                                            <span class="notification information">This is an informative message.</span>
                                    </p>
                                            
                                    <p>
                                            <label>Real name</label>
                                            <input id="real_name" type="text" class="medium" value="Bram Jetten" /><!-- the value-attribute overwrites the <label>Username</label> -->
                                            <span class="notification success">Success!</span>
                                    </p>
                                            
                                    <p>
                                            <label>Birthday</label>
                                            <input id="birthday" type="text" class="small datepicker" />
                                            <span class="notification error">Error!</span>
                                            <small>This is a datepicker!</small>
                                    </p>
                                    
                                    <p>
                                            <label>Select an option</label>
                                            <select>
                                                    <option>Choose an option...</option>
                                                    <option>Option 1</option>
                                                    <option selected="selected">Option 2</option>
                                                    <option>Option 3</option>
                                            </select>
                                            <span class="notification warning">Warning!</span>
                                            <small>Just for the sake of adding a dropdown.</small>
                                    </p>
                                            
                                    <p>
                                            <textarea class="wysiwyg"></textarea>
                                    </p>
                            </fieldset>
                    
                            <input type="submit" value="Submit" />
                    </form>
            </div>
    </div>
    
    <div class="content-box">
            <div class="content-box-header">
                    <h3>Heading-, paragraph- and list-styles</h3>
            </div>
            
            <div class="content-box-content">
                    <h1>Heading 1</h1>
                    <h2>Heading 2</h2>
                    <h3>Heading 3</h3>
                    <h4>Heading 4</h4>
                    <h5>Heading 5</h5>
                    <h6>Heading 6</h6>
                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
                    
                    <div class="column-left">
                            <ul>
                                    <li>Unordered</li>
                                    <li>Lists</li>
                                    <li>And</li>
                                    <li>List</li>
                                    <li>Items</li>
                                    <li>Are</li>
                                    <li>Cool</li>
                                    <li>Right?</li>
                            </ul>
                    </div>
                    
                    <div class="column-right">
                            <ol>
                                    <li>Maybe</li>
                                    <li>Ordered</li>
                                    <li>Lists</li>
                                    <li>Are</li>
                                    <li>Even</li>
                                    <li>More</li>
                                    <li>Awesome!</li>
                            </ol>
                    </div>
                    
                    <div class="clear"></div>
                    
            </div>
    </div>