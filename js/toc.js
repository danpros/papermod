/*jslint
    white: true,
    browser: true,
    vars: true
*/

/**
 * Generates a table of contents for your document based on the headings
 *  present. Anchors are injected into the document and the
 *  entries in the table of contents are linked to them. The table of
 *  contents will be generated inside of the first element with the id `toc`.
 * @param {HTMLDOMDocument} documentRef Optional A reference to the document
 *  object. Defaults to `document`.
 * @author Matthew Christopher Kastor-Inare III
 * @version 20130726
 * @example
 * // call this after the page has loaded
 * htmlTableOfContents();
 */
 
 /**
 * Modified by @danpros
 * select only in #content
 * using the heading title as the slug IDs
 * insert the anchor inside the heading 
 * fix browser not scrolling to the hash
 */
function htmlTableOfContents (documentRef) {
    var documentRef = documentRef || document;
    var toc = documentRef.getElementById('toc');
    var headings = [].slice.call(documentRef.body.querySelectorAll('#post-content h1, #post-content h2, #post-content h3, #post-content h4, #post-content h5, #post-content h6'));
    if (headings && headings.length) {
        headings.forEach(function (heading, index) {
            heading.setAttribute('id', 'toc-' + heading.textContent.replace(/\s+/g, '-').toLowerCase());
            heading.setAttribute('class', 'toc-link');

            var anchor = documentRef.createElement('a');
            anchor.setAttribute('href', '#toc-' + heading.textContent.replace(/\s+/g, '-').toLowerCase());
            anchor.setAttribute('class', 'anchor');
            anchor.innerHTML = '<svg fill="currentColor" viewBox="0 0 24 24" height="20" xmlns="http://www.w3.org/2000/svg"><path d="M0 0h24v24H0z" fill="none"></path><path d="M3.9 12c0-1.71 1.39-3.1 3.1-3.1h4V7H7c-2.76.0-5 2.24-5 5s2.24 5 5 5h4v-1.9H7c-1.71.0-3.1-1.39-3.1-3.1zM8 13h8v-2H8v2zm9-6h-4v1.9h4c1.71.0 3.1 1.39 3.1 3.1s-1.39 3.1-3.1 3.1h-4V17h4c2.76.0 5-2.24 5-5s-2.24-5-5-5z"></path></svg>';

            var link = documentRef.createElement('a');
            link.setAttribute('href', '#toc-' + heading.textContent.replace(/\s+/g, '-').toLowerCase());
            link.textContent = heading.textContent;

            var div = documentRef.createElement('div');
            div.setAttribute('class', heading.tagName.toLowerCase() + '-toc');

			heading.appendChild(anchor);
			div.appendChild(link);
			toc.appendChild(div);
        });
        documentRef.getElementById('toc-wrapper').style.display = 'block';
    }
    
    if (window.location.hash) {
        var hash = window.location.hash;
        scrollToHash(hash);
    }
}

// fix browser not scrolling to the hash
function scrollToHash (hash) {
    setTimeout(function() {
        hashtag = hash; 
        location.hash = '';
        location.hash = hashtag;
    }, 300);    
}

try {
     module.exports = htmlTableOfContents;
} catch (e) {
    // module.exports is not defined
}
