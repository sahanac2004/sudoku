<!
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sudoku Rules and Regulations</title>
    <!--<style>body {
        font-family: Arial, sans-serif;
        margin: 0;
        padding: 0;
    }
    
    .rules-container {
        max-width: 800px;
        margin: 50px auto;
        padding: 20px;
        background-color: #f9f9f9;
        border: 1px solid #ccc;
    }
    
    h1 {
        text-align: center;
    }
    
    p {
        margin-bottom: 10px;
    }</style> -->
    <style> body { background: linear-gradient(to right, #59b6bf, #ff5e62); background-size: 100% 100%; animation: gradient 2s ease infinite; margin: 0; padding: 0; }
        .rules-container { max-width: 800px; margin: 50px auto; padding: 20px; background-color: rgba(255, 255, 255, 0.8); border-radius: 10px; box-shadow: 0 10px 20px rgba(0, 0, 0, 0.3);
        
        animation: float 2s ease infinite;
        
        }
        
        @keyframes gradient { 0% { background-position: 0%; } 50% { background-position: 100%; } 100% { background-position: 0%; } }
        
        @keyframes float { 0% { transform: translatey(0px); } 50% { transform: translatey(-20px); } 100% { transform: translatey(0px); } }
        
        h1 { text-align: center; font-size: 3rem; margin-bottom: 30px; text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5); }
        
        p { margin-bottom: 1rem; line-height: 1.5; }
        
        .btn { display: inline-block; background-color: #3494e6; color: #fff; padding: 10px 20px; border-radius: 5px; text-decoration: none; margin-top: 2rem;
        
        transition: background-color 0.3s ease;
        
        }
        
        .btn:hover { background-color: #2e86c1; }
        
        strong { font-weight: bold; }
        
        img { width: 100%; border-radius: 10px; }
        
        </style>
</head>
<body>
    <div class="rules-container">
        <h1>Sudoku Rules and Regulations</h1>
        <p><strong>Objective:</strong> The goal of Sudoku is to correctly fill in a 9x9 grid with numbers from 1 to 9. Each row, column, and 3x3 region must contain all numbers from 1 to 9 without repetition.</p>
        <p><strong>Grid Structure:</strong> The Sudoku grid consists of 81 squares divided into nine 3x3 blocks. Each block must have all numbers from 1 to 9 without duplicates. Rows, columns, and regions must also contain all numbers from 1 to 9 without repetition.</p>
        <p><strong>Gameplay:</strong> Use logic, reasoning, and deduction to fill in empty squares with the correct numbers. Each square should have only one number unless using notes. Ensure that all rows, columns, and blocks adhere to the rules without conflicts.</p>
        <p><strong>Strategies:</strong> Utilize logic, reasoning, and deduction to determine the correct numbers for each square. Avoid guessing and focus on using the process of elimination to find the missing numbers.</p>
        <p><strong>Solving Techniques:</strong> Each Sudoku puzzle has exactly one correct solution. The total of each row, column, and region must add up to 45 (1+2+3+4+5+6+7+8+9=45). Sudoku puzzles can be solved using basic techniques and advanced strategies.</p>
        <p><strong>Additional Guidelines:</strong> Sudoku is a game of logic and reasoning, rewarding patience, insights, and pattern recognition. Avoid guessing and focus on scanning the grid for opportunities to place numbers based on logic. Use the process of elimination to deduce which numbers fit based on the numbers already present in the grid.</p>
    </div>
    <div class="rules-container">
        <h1>How to Play Sudoku?</h1>
        <img src="1.jpg" alt="Sudoku Grid">
        <h3>Sudoku Rule no 1: Use Numbers 1-9</h3>
        <p>
            Sudoku is played on a grid of 9 x 9 spaces. Each row, column, and square must be filled with numbers 1-9 without repetition.
            Sudoku is played on a grid of 9 x 9 spaces. Within the rows and columns are 9 “squares” (made up of 3 x 3 spaces).
            Each row, column and square (9 spaces each) needs to be filled out with the numbers 1-9, without repeating any numbers within the row, column or square.
            Does it sound complicated? As you can see from the image below of an actual Sudoku grid, each Sudoku grid comes with a few spaces already filled in;
            the more spaces filled in, the easier the game, the more difficult Sudoku puzzles have very few spaces that are already filled in.
        </p>
        <h3>Sudoku Rule no 2: Don't Repeat Any Numbers</h3>
        <img src="2.jpg" alt="Sudoku Example">
        <p>
            Avoid repeating numbers within the same row, column, or square. Use deduction to fill in missing numbers.
            As you can see, in the upper left square (circled in blue), this square already has 7 out of the 9 spaces filled in. The only numbers missing from the
            square are 5 and 6. By seeing which numbers are missing from each square, row, or column, we can use process of elimination and deductive reasoning to
            decide which numbers need to go in each blank space.
            For example, in the upper left square, we know we need to add a 5 and a 6 to be able to complete the square, but based on the neighboring rows and squares
            we cannot clearly deduce which number to add in which space. This means that we should ignore the upper left square for now, and try to fill in spaces in
            some other areas of the grid instead.
        </p>
        <h3>Sudoku Rule no 3: Don't Guess</h3>
        <p> 
                Sudoku is a game of logic and reasoning, so you shouldn't have to guess. If you don't
                know what number to put in a certain space, keep scanning the other areas of the 
                grid until you seen an opportunity to place a number. But don't try to “force” 
                anything  Sudoku rewards patience, insights, and recognition of patterns, not blind
                luck or guessing.
            </p>
            Logic and reasoning are key in Sudoku. Avoid guessing and focus on patterns and deductions.
        </p>
        <h3>Sudoku Rule no 4: Use Process of Elimination</h3>
        <img src="3.jpg" alt="Sudoku Elimination">
        <p>
            Utilize the process of elimination to determine missing numbers based on existing placements. What do we mean by using “process of elimination” to play Sudoku? Here is an example.
            In this Sudoku grid (shown below), the far left-hand vertical column (circled in Blue)
            is missing only a few numbers: 1, 5 and 6.
            One way to figure out which numbers can go in each space is to use “process of elimination”
            by checking to see which other numbers are already include within each square since
            there can be no duplication of numbers 1-9 within each square (or row or column).
        In this case, we can quickly notice that there are already number 1s in the top left and center left squares 
            of the grid (with number 1s circled in red). This means that there is only one space remaining in the far 
            left column where a 1 could possibly go  circled in green. This is how the process of elimination works in 
            Sudoku  you find out which spaces are available, which numbers are missing  and then deduce, based on the 
            position of those numbers within the grid, which numbers fit into each space.
            Sudoku rules are relatively uncomplicated  but the game is infinitely varied, with millions of possible number
            combinations and a wide range of levels of difficulty. But it's all based on the simple principles of using 
            numbers 1-9, filling in the blank spaces based on deductive reasoning, and never repeating any numbers within 
            each square, row or column.

        </p>
        <a href="competition.php" class="btn">Goback</a>
    </div>


</body>
</html>