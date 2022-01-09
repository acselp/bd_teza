<?php include $_SERVER['DOCUMENT_ROOT'] . '/views/blocks/header.php'; ?>

<section class="cabinet-section">
    <div class="container">
        <div class="row">

            <h3>Cabinet personal</h3>
            
            <h4>Salut, <?php echo $user['fname'];?>!</h4>

            <style>
                                
                .styled-table tbody tr.active-row {
                    font-weight: bold;
                    color: #009879;
                }

                .styled-table tbody tr {
                    border-bottom: 1px solid #dddddd;
                }

                .styled-table tbody tr:nth-of-type(even) {
                    background-color: #f3f3f3;
                }

                .styled-table tbody tr:last-of-type {
                    border-bottom: 2px solid #009879;
                }

                .styled-table th,
                .styled-table td {
                    padding: 12px 15px;
                }

                .styled-table thead tr {
                    background-color: #009879;
                    color: #ffffff;
                    text-align: left;
                }

                .styled-table {
                    border-collapse: collapse;
                    margin: 25px 0;
                    font-size: 0.9em;
                    font-family: sans-serif;
                    min-width: 400px;
                    box-shadow: 0 0 20px rgba(0, 0, 0, 0.15);
                }
            </style>

            <table class="styled-table">
                <thead>
                    <tr>
                        <th></th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="active-row">
                        <td>Tip account</td>
                        <td><?=$user['type'] ?></td>
                    </tr>
                    <tr>
                        <td>Nume</td>
                        <td><?=$user['fname'] ?></td>
                    </tr>
                    <tr>
                        <td>Prenume</td>
                        <td><?=$user['lname'] ?></td>
                    </tr>
                    <tr>
                        <td>Email</td>
                        <td><?=$user['email'] ?></td>
                    </tr>
                    <tr>
                        <td>Parola</td>
                        <td><?=$user['password'] ?></td>
                    </tr>
                    
                    <tr>
                        <td>Adresa</td>
                        <td><?=$user['adress'] ?></td>
                    </tr>
                    <tr>
                        <td>Numar de tel.</td>
                        <td><?=$user['contact_nr'] ?></td>
                    </tr>
                    
                </tbody>
            </table>

            <li><a href="/cabinet/edit">Modifica datele personale</a></li>
            <?php if($user['type'] === 'Vanzator'):?>
                <li><a href="/seller/product">Produsele mele</a></li>
                <li><a href="/product">Managementul comenzilor</a></li>
            <?php else:?>
                <li><a href="/product">Comenzile mele</a></li>
            <?php endif;?>
                <!--<li><a href="/cabinet/history">Список покупок</a></li>-->
            </ul>
            
        </div>
    </div>
</section>

<?php include $_SERVER['DOCUMENT_ROOT'] . '/views/blocks/footer.php'; ?>