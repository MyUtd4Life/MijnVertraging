<?php
class HomepageView extends GeneralView{

    public function __construct($treinen) {
        parent::__construct($treinen);
    }

    public function getHtml(){
        ob_start();
        echo '<div id="vertrektijden">';
        foreach ($this->getTreinen() as $trein) {
            echo '<div class="treinRit">';
            echo '<div class="vertrekTijdInfo">';
            echo '<span class="vertrekTijd">' . $trein->getVertrekTijd() . '</span>';
            if ($trein->getVertrekVertragingTekst() != null) {
                echo '<span class="vertrekVertraging red">' . $trein->getVertrekVertragingTekst() . '</span>';
            }
            echo '</div>';
            echo '<span class="eindBestemming">' . $trein->getEindbestemming() . '</span>';
            echo '<span class="arrow arrow-down"></span>';
            echo '<div class="treinRitDetails">';
            if ($trein->getRouteTekst() != "") {
                echo '<span class="entypo-map routeTekst">Routetekst: ' . $trein->getRouteTekst() . '</span><br />';
            }
            echo '<span class="entypo-doc-text ritNummer">Ritnummer: ' . $trein->getRitNummer() . '</span><br />';
            echo '<span class="entypo-address vertrekSpoor ' . ($trein->getVertrekSpoorGewijzigd() == "true" ? "red":"") . '">Spoor: ' . $trein->getVertrekSpoor() . '</span><br />';
            if ($trein->getReisTip() != ""){
            echo '<span class="entypo-info-circled entypo-reisTip">Reistip: ' . $trein->getReisTip() . '</span>';
            }
            echo '</div>';
            echo '</div>';
        }
        return ob_get_clean();
        echo '</div>';
    }

} 