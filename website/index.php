<!DOCTYPE html>
<html lang="en">



<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="icon" type="image/x-icon" href="assets/protein.ico">
    <title>Conversor de DNA</title>
</head>


<body>
    <header>
        <img src="assets/dna1.png" id="logo">
        <h1>CONVERSÃO DE DNA</h1>
        <img src="assets/dna2.png" id="logo">
    </header>


    <section id="main">

        <div id="proteins">
            <h2>Lista de códons</h2>
            <br>
            <div id="tabela">
                <ul>
                    <li>UUU: F</li>
                    <li>UUC: F</li>
                    <li>UUA: L</li>
                    <li>UUG: L</li>
                    <li>UCU: S</li>
                    <li>UCC: S</li>
                    <li>UCA: S</li>
                    <li>UCG: S</li>
                    <li>UAU: Y</li>
                    <li>UAC: Y</li>
                    <li>UAA: *</li>
                    <li>UAG: *</li>
                    <li>UGU: C</li>
                    <li>UGC: C</li>
                    <li>UGA: *</li>
                    <li>UGG: W</li>
                </ul>
                <img src="assets/bar.png">
                <ul>
                    <li>CUU: L</li>
                    <li>CUC: L</li>
                    <li>CUA: L</li>
                    <li>CUG: L</li>
                    <li>CCU: P</li>
                    <li>CCC: P</li>
                    <li>CCA: P</li>
                    <li>CCG: P</li>
                    <li>CAU: H</li>
                    <li>CAC: H</li>
                    <li>CAA: Q</li>
                    <li>CAG: Q</li>
                    <li>CGU: R</li>
                    <li>CGC: R</li>
                    <li>CGA: R</li>
                    <li>CGG: R</li>
                </ul>
                <img src="assets/bar.png">
                <ul>
                    <li>AUU: I</li>
                    <li>AUC: I</li>
                    <li>AUA: I</li>
                    <li>AUG: ></li>
                    <li>ACU: T</li>
                    <li>ACC: T</li>
                    <li>ACA: T</li>
                    <li>ACG: T</li>
                    <li>AAU: N</li>
                    <li>AAC: N</li>
                    <li>AAA: K</li>
                    <li>AAG: K</li>
                    <li>AGU: S</li>
                    <li>AGC: S</li>
                    <li>AGA: R</li>
                    <li>AGG: R</li>
                </ul>
                <img src="assets/bar.png">
                <ul>
                    <li>GUU: V</li>
                    <li>GUC: V</li>
                    <li>GUA: V</li>
                    <li>GUG: V</li>
                    <li>GCU: A</li>
                    <li>GCC: A</li>
                    <li>GCA: A</li>
                    <li>GCG: A</li>
                    <li>GAU: D</li>
                    <li>GAC: D</li>
                    <li>GAA: E</li>
                    <li>GAG: E</li>
                    <li>GGU: G</li>
                    <li>GGC: G</li>
                    <li>GGA: G</li>
                    <li>GGG: G</li>
                </ul>

            </div>
        </div>


        <div id="dna">
            <form action="index.php" method="post">
                <label>Digite a sequência:</label>
                <input type="text" name="dna">
                <input type="submit" VALUE="CONVERTER!">
            </form>

            <div id="codons">

                <div id="pre-traducao">
            
                    <?php
                        
                        $dna = $_POST["dna"];
                        $dna = strtoupper($dna);
                        $index = 0;



                        // Mostra, de 3 em 3, as sequências do DNA

                        if (strlen($dna) % 3 != 0)
                        {
                            echo "<br>Digite um múltiplo de 3!<br>";
                        }
                        else
                        {
                            echo "<br><h3>Códons DNA:</h3>";
                            for ($i = 0; $i < strlen($dna); $i+= 3)
                            {
                                $index++;
                                echo "<br>Códon " . $index . ": " . $dna[$i] . $dna[$i+1] . $dna[$i+2] . "<br>";
                            }
                            






                            // TRADUZ DNA

                            for ($i = 0; $i < strlen($dna); $i++)
                            {
                                switch ($dna[$i])
                                {
                                    case 'A': $dna[$i] = 'U'; break;
                                    case 'T': $dna[$i] = 'A'; break;
                                    case 'C': $dna[$i] = 'G'; break;
                                    case 'G': $dna[$i] = 'C'; break;
                                }
                            }



                    ?>
                </div>

                <div id="pos-traducao">
                    <?php

                            // PRINT RNA

                            $index = 0;
                            echo "<br><br><h3>Códons RNA:</h3>";
                            for ($i = 0; $i < strlen($dna); $i+= 3)
                            {
                                $index++;
                                echo "<br>Códon " . $index . ": " . $dna[$i] . $dna[$i+1] . $dna[$i+2] . "<br>";
                            }



                            

                            // PROTEINAS

                            $prots = [];
                            $index = 0;
                            $temp = "";

                            for ($i = 0; $i < strlen($dna); $i+= 3)
                            {
                                $temp = $dna[$i] . $dna[$i+1] . $dna[$i+2];

                                switch ($temp)
                                {
                                    case "UUU": $prots[$index] = 'F'; break;
                                    case "UUC": $prots[$index] = 'F'; break;
                                    case "UUA": $prots[$index] = 'L'; break;
                                    case "UUG": $prots[$index] = 'L'; break;
                                    case "UCU": $prots[$index] = 'S'; break;
                                    case "UCC": $prots[$index] = 's'; break;
                                    case "UCA": $prots[$index] = 'S'; break;
                                    case "UCG": $prots[$index] = 'S'; break;
                                    case "UAU": $prots[$index] = 'Y'; break;
                                    case "UAC": $prots[$index] = 'Y'; break;
                                    case "UAA": $prots[$index] = '*'; break;
                                    case "UAG": $prots[$index] = '*'; break;
                                    case "UGU": $prots[$index] = 'C'; break;
                                    case "UGC": $prots[$index] = 'C'; break;
                                    case "UGA": $prots[$index] = '*'; break;
                                    case "UGG": $prots[$index] = 'W'; break;
                                    case "CUU": $prots[$index] = 'L'; break;
                                    case "CUC": $prots[$index] = 'L'; break;
                                    case "CUA": $prots[$index] = 'L'; break;
                                    case "CUG": $prots[$index] = 'L'; break;
                                    case "CCU": $prots[$index] = 'P'; break;
                                    case "CCC": $prots[$index] = 'P'; break;
                                    case "CCA": $prots[$index] = 'P'; break;
                                    case "CCG": $prots[$index] = 'P'; break;
                                    case "CAU": $prots[$index] = 'H'; break;
                                    case "CAC": $prots[$index] = 'H'; break;
                                    case "CAA": $prots[$index] = 'Q'; break;
                                    case "CAG": $prots[$index] = 'Q'; break;
                                    case "CGU": $prots[$index] = 'R'; break;
                                    case "CGC": $prots[$index] = 'R'; break;
                                    case "CGA": $prots[$index] = 'R'; break;
                                    case "CGG": $prots[$index] = 'R'; break;
                                    case "AUU": $prots[$index] = 'I'; break;
                                    case "AUC": $prots[$index] = 'I'; break;
                                    case "AUA": $prots[$index] = 'I'; break;
                                    case "AUG": $prots[$index] = '>'; break;
                                    case "ACU": $prots[$index] = 'T'; break;
                                    case "ACC": $prots[$index] = 'T'; break;
                                    case "ACA": $prots[$index] = 'T'; break;
                                    case "ACG": $prots[$index] = 'T'; break;
                                    case "AAU": $prots[$index] = 'N'; break;
                                    case "AAC": $prots[$index] = 'N'; break;
                                    case "AAA": $prots[$index] = 'K'; break;
                                    case "AAG": $prots[$index] = 'K'; break;
                                    case "AGU": $prots[$index] = 'S'; break;
                                    case "AGC": $prots[$index] = 'S'; break;
                                    case "AGA": $prots[$index] = 'R'; break;
                                    case "AGG": $prots[$index] = 'R'; break;
                                    case "GUU": $prots[$index] = 'V'; break;
                                    case "GUC": $prots[$index] = 'V'; break;
                                    case "GUA": $prots[$index] = 'V'; break;
                                    case "GUG": $prots[$index] = 'V'; break;
                                    case "GCU": $prots[$index] = 'A'; break;
                                    case "GCC": $prots[$index] = 'A'; break;
                                    case "GCA": $prots[$index] = 'A'; break;
                                    case "GCG": $prots[$index] = 'A'; break;
                                    case "GAU": $prots[$index] = 'D'; break;
                                    case "GAC": $prots[$index] = 'D'; break;
                                    case "GAA": $prots[$index] = 'E'; break;
                                    case "GAG": $prots[$index] = 'E'; break;
                                    case "GGU": $prots[$index] = 'G'; break;
                                    case "GGC": $prots[$index] = 'G'; break;
                                    case "GGA": $prots[$index] = 'G'; break;
                                    case "GGG": $prots[$index] = 'G'; break;
                                }
                                $index++;
                            }
                    ?>
                </div>
            </div>
            <?php

                            echo "<br><br>Proteínas: ";

                            for ($i = 0; $i < $index; $i++)
                            {
                                echo "$prots[$i] ";
                            }
                        }
            ?>
        </div>

    </section>


    <footer>
        <img src="assets/gib2c.png" id="gib2c">
        <img src="assets/logo-uff.png" id="uff">
    </footer>
</body>



</html>