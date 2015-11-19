var $collectionHolder;

// setup an "ajouter" link
var $addSpeakerLink = $('<a href="#" class="add_speaker_link">ajouter</a>');
var $newLinkLi = $('<li></li>').append($addSpeakerLink);

jQuery(document).ready(function() {
    // Get the ul that holds the collection of speakers
    $collectionHolder = $('ul.speakers');

    // add a delete link to all of the existing speaker form li elements
    $collectionHolder.find('li').each(function() {
        addSpeakerFormDeleteLink($(this));
    });

    // add the "ajouter" anchor and li to the speakers ul
    $collectionHolder.append($newLinkLi);

    // count the current form inputs we have (e.g. 2), use that as the new
    // index when inserting a new item (e.g. 2)
    $collectionHolder.data('index', $collectionHolder.find(':input').length);

    $addSpeakerLink.on('click', function(e) {
        // prevent the link from creating a "#" on the URL
        e.preventDefault();

        // add a new speaker form (see next code block)
        addSpeakerForm($collectionHolder, $newLinkLi);
    });
});



function addSpeakerForm($collectionHolder, $newLinkLi) {
    // Get the data-prototype explained earlier
    var prototype = $collectionHolder.data('prototype');

    // get the new index
    var index = $collectionHolder.data('index');

    // Replace '__name__' in the prototype's HTML to
    // instead be a number based on how many items we have
    var newForm = prototype.replace(/__name__/g, index);

    // increase the index with one for the next item
    $collectionHolder.data('index', index + 1);

    // Display the form in the page in an li, before the "ajouter" link li
    var $newFormLi = $('<li></li>').append(newForm);
    $newLinkLi.before($newFormLi);
}



function addSpeakerFormDeleteLink($speakerFormLi) {
    var $removeFormA = $('<a href="#">supprimer </a>');
    $speakerFormLi.append($removeFormA);

    $removeFormA.on('click', function(e) {
        // prevent the link from creating a "#" on the URL
        e.preventDefault();

        // remove the li for the speaker form
        $speakerFormLi.remove();
    });
}