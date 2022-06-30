<?php

// --------------------------------------------------------------------------

function echoSearchBar($heading){
    echo"
    <div class='flex-container-searchBarButtons'>
        <div>
            <h2>$heading</h2>
            <div class='flex-item-SearchBar'>
                <form action='' class='search-bar' method='post'>
                <input type='text' placeholder='Search' name='searchBar'>
                <button class='searchB' type='submit'><img class= 'searchButton'src='/images/search.jpg' alt='search'></button>
                </form>
            </div> 
        </div>     
";    
}

// --------------------------------------------------------------------------

function echoAddStudentButton($buttonText){
    echo"
        <div class='flex-item-buttons'>              
            <button onclick= \"document.getElementById('id01').style.display='block'\" style='width:fit-content;'>$buttonText</button>
        </div>
    </div>    
";    
}

// --------------------------------------------------------------------------

function echoStudentTable($students){
    echo"
    <div class='studentTable'>
        <table id='tableContainer'>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>ELO</th>
                <th>Credits</th>
                <th>Classes</th>
                <th>Next Class in</th>                   
            </tr>
";       

    foreach($students as $student){                                                        
        echo"
        <tr>
            <td><a href='student_profile.php?studentId=".$student['StudentId']."'>".$student['FirstName']." ".$student['LastName']."</a></td>    
            <td>".$student['Email']."</td>
            <td>".$student['Phone']."</td>
            <td>".$student['ELO']."</td>   
            <td>".$student['Credits']."</td>   
            <td>".$student['Classes']."</td>";
            
            $daysToNextCLass = $student['DaysToNextClass']['Days']." days";
            
            if($student['DaysToNextClass']['Months'] != 0){
                $daysToNextCLass = $student['DaysToNextClass']['Months']." months and ".$student['DaysToNextClass']['Days']. " days";
            }
        echo"
            <td>$daysToNextCLass</td>                                    
        </tr> 
";     
} 
echo"</table>
</div>
";
}  

// --------------------------------------------------------------------------
