<?php
if (!isset($_SESSION["userid"]) || $_SESSION["userid"] != "1") {
    header('Location: ' . ROOT . '/signin');
}

if (!isset($_SESSION["admin"]) || $_SESSION["admin"] != "1") {
    header('Location: ' . ROOT . '/signin');
}

$e = "";
$hero_title = "Dynasty - Roster Parse";
$hero_text = "Roster parse utility";

$content = "";
/*
// Conference USA
$content .= readHTML('https://www.cbssports.com/college-football/teams/FIU/fiu-panthers/roster/');
$content .= readHTML('https://www.cbssports.com/college-football/teams/JAXST/jacksonville-state-gamecocks/roster/');
$content .= readHTML('https://www.cbssports.com/college-football/teams/KENSAW/kennesaw-state-owls/roster/');
$content .= readHTML('https://www.cbssports.com/college-football/teams/LIB/liberty-flames/roster/');
$content .= readHTML('https://www.cbssports.com/college-football/teams/LATECH/louisiana-tech-bulldogs/roster/');
$content .= readHTML('https://www.cbssports.com/college-football/teams/MTSU/middle-tenn-blue-raiders/roster/');
$content .= readHTML('https://www.cbssports.com/college-football/teams/NMEXST/new-mexico-state-aggies/roster/');
$content .= readHTML('https://www.cbssports.com/college-football/teams/SAMST/sam-houston-bearkats/roster/');
$content .= readHTML('https://www.cbssports.com/college-football/teams/UTEP/utep-miners/roster/');
$content .= readHTML('https://www.cbssports.com/college-football/teams/WKY/western-kentucky-hilltoppers/roster/');
*/
// American Athletic
$content .= readHTML('https://www.cbssports.com/college-football/teams/ARMY/army-west-point-black-knights/roster/');
$content .= readHTML('https://www.cbssports.com/college-football/teams/CHARLO/charlotte-49ers/roster/');
$content .= readHTML('https://www.cbssports.com/college-football/teams/ECU/east-carolina-pirates/roster/');
$content .= readHTML('https://www.cbssports.com/college-football/teams/FAU/florida-atlantic-owls/roster/');
$content .= readHTML('https://www.cbssports.com/college-football/teams/MEMP/memphis-tigers/roster/');
$content .= readHTML('https://www.cbssports.com/college-football/teams/NAVY/navy-midshipmen/roster/');
$content .= readHTML('https://www.cbssports.com/college-football/teams/NTEXAS/north-texas-mean-green/roster/');
$content .= readHTML('https://www.cbssports.com/college-football/teams/RICE/rice-owls/roster/');
$content .= readHTML('https://www.cbssports.com/college-football/teams/SFLA/south-florida-bulls/roster/');
$content .= readHTML('https://www.cbssports.com/college-football/teams/TEMPLE/temple-owls/roster/');
$content .= readHTML('https://www.cbssports.com/college-football/teams/TULANE/tulane-green-wave/roster/');
$content .= readHTML('https://www.cbssports.com/college-football/teams/TULSA/tulsa-golden-hurricane/roster/');
$content .= readHTML('https://www.cbssports.com/college-football/teams/UAB/uab-blazers/roster/');
$content .= readHTML('https://www.cbssports.com/college-football/teams/TXSA/utsa-roadrunners/roster/');

// Atlantic Coast
$content .= readHTML('https://www.cbssports.com/college-football/teams/BC/boston-college-eagles/roster/');
$content .= readHTML('https://www.cbssports.com/college-football/teams/CAL/california-golden-bears/roster/');
$content .= readHTML('https://www.cbssports.com/college-football/teams/CLEM/clemson-tigers/roster/');
$content .= readHTML('https://www.cbssports.com/college-football/teams/DUKE/duke-blue-devils/roster/');
$content .= readHTML('https://www.cbssports.com/college-football/teams/FSU/florida-state-seminoles/roster/');
$content .= readHTML('https://www.cbssports.com/college-football/teams/GATECH/georgia-tech-yellow-jackets/roster/');
$content .= readHTML('https://www.cbssports.com/college-football/teams/LVILLE/louisville-cardinals/roster/');
$content .= readHTML('https://www.cbssports.com/college-football/teams/GATECH/georgia-tech-yellow-jackets/roster/');
$content .= readHTML('');
$content .= readHTML('');
$content .= readHTML('');
$content .= readHTML('');
$content .= readHTML('');
$content .= readHTML('');
$content .= readHTML('');
$content .= readHTML('');
$content .= readHTML('');
$content .= readHTML('');
$content .= readHTML('');
$content .= readHTML('');
$content .= readHTML('');
$content .= readHTML('');
$content .= readHTML('');
$content .= readHTML('');
$content .= readHTML('');
$content .= readHTML('');
$content .= readHTML('');

// Big Ten
$content .= readHTML('');
$content .= readHTML('');

?>
<style>
    td {
        font-size: 0.7rem;
    }
</style>
<section>
    <div class="container-fluid container-page">
        <div class="row">
            <div class="col-sm-2 align-items-stretch">
                <h2>Roster Parse</h2>
            </div>
        </div>
        <div class="row mt-0">
            <div class="col-sm-12 align-items-stretch mb-4">
                <?php echo $content; ?>
            </div>
        </div>
    </div>
</section>
<?php include "include/footer.php"; ?>