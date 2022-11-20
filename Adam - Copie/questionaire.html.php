<?php include 'connexion_bd.php';
include 'fonction2.php';



//Give me 100 random questions about health in html i dont have the question

//I have the answer in the database now i want to display the question in html

//I dont know how to do it

//I don't have the answer and i dont have the question


//Give me a form with 2 checkbox
?>

Give me a 2 obligaotry checkbox for one question

<form action="validation.php" method="post" novalidate>
    <fieldset>
        <legend>Avez vous des enfants</legend>
        <label><input checked type="radio" name="radio">Oui </label>
        <label><input type="radio" name="radio">Non</label>
    </fieldset>
    <fieldset>
        <legend>Quel est votre age</legend>
        <label><input checked type="radio" name="radio">18-25 </label>
        <label><input type="radio" name="radio">25-35</label>
        <label><input type="radio" name="radio">35-45</label>
        <label><input type="radio" name="radio">45-55</label>
        <label><input type="radio" name="radio">55-65</label>
        <label><input type="radio" name="radio">65+</label>
    </fieldset>
    <fieldset>
        <legend>Quel est votre origine</legend>
        <label><input checked type="radio" name="radio">Francais </label>
        <label><input type="radio" name="radio">Europeen</label>
        <label><input type="radio" name="radio">Asiatique</label>
        <label><input type="radio" name="radio">Africain</label>
        <label><input type="radio" name="radio">Americain</label>
        <label><input type="radio" name="radio">Autre</label>
    </fieldset>
    <fieldset>
        <legend>Quel est votre taille</legend>
        <label><input checked type="radio" name="radio">1m50-1m60 </label>
        <label><input type="radio" name="radio">1m60-1m70</label>
        <label><input type="radio" name="radio">1m70-1m80</label>
        <label><input type="radio" name="radio">1m80-1m90</label>
        <label><input type="radio" name="radio">1m90-2m00</label>
        <label><input type="radio" name="radio">2m00+</label>
    </fieldset>
    <fieldset>
        <legend>Quelle est votre couleur des yeux</legend>
        <label><input checked type="radio" name="radio">Bleu </label>
        <label><input type="radio" name="radio">Vert</label>
        <label><input type="radio" name="radio">Marron</label>
        <label><input type="radio" name="radio">Noir</label>
        <label><input type="radio" name="radio">Autre</label>
    </fieldset>
    <fieldset>
        <legend>Quelle est votre pilosité</legend>
        <label><input checked type="radio" name="radio">Faible </label>
        <label><input type="radio" name="radio">Moyenne</label>
        <label><input type="radio" name="radio">Forte</label>
    </fieldset>
    <fieldset>
        <legend>Quelle est votre couleur des cheveux</legend>
        <label><input checked type="radio" name="radio">Blond </label>
        <label><input type="radio" name="radio">Brun</label>
        <label><input type="radio" name="radio">Roux</label>
        <label><input type="radio" name="radio">Noir</label>
        <label><input type="radio" name="radio">Autre</label>
    </fieldset>
    <fieldset>
        <legend>Combien de fois par semaine faites vous du sport</legend>
        <label><input checked type="radio" name="radio">0 </label>
        <label><input type="radio" name="radio">1</label>
        <label><input type="radio" name="radio">2</label>
        <label><input type="radio" name="radio">3</label>
        <label><input type="radio" name="radio">4</label>
        <label><input type="radio" name="radio">5</label>
        <label><input type="radio" name="radio">6</label>
        <label><input type="radio" name="radio">7</label>
    </fieldset>
    <fieldset>
        <legend>Combien de fois par semaine mangez vous des fruits</legend>
        <label><input checked type="radio" name="radio">0 </label>
        <label><input type="radio" name="radio">1</label>
        <label><input type="radio" name="radio">2</label>
        <label><input type="radio" name="radio">3</label>
        <label><input type="radio" name="radio">4</label>
        <label><input type="radio" name="radio">5</label>
        <label><input type="radio" name="radio">6</label>
        <label><input type="radio" name="radio">7</label>
    </fieldset>
    <fieldset>
        <legend>Avez vous des enfants</legend>
        <label><input checked type="radio" name="radio">Oui</label>
        <label><input type="radio" name="radio">Non</label>
    </fieldset>

    <input type="submit" value="Envoyer">
</form>