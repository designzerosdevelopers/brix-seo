
function format(command, value = null) {
    document.execCommand(command, false, value);
}

function chooseTextColor() {
    var color = prompt("Enter a color name or hex value:");
    if (color) {
        document.execCommand('foreColor', false, color);
    }
}

function chooseBackgroundColor() {
    var color = prompt("Enter a color name or hex value:");
    if (color) {
        document.execCommand('hiliteColor', false, color);
    }
}

function insertLink() {
    var url = prompt("Enter the URL:");
    if (url) {
        document.execCommand('createLink', false, url);
    }
}

function insertImage() {
    var url = prompt("Enter the image URL:");
    if (url) {
        document.execCommand('insertImage', false, url);
    }
}

function insertTable() {
    var rows = prompt("Enter number of rows:");
    var columns = prompt("Enter number of columns:");
    if (rows && columns) {
        var html = "<table border='1'>";
        for (var i = 0; i < rows; i++) {
            html += "<tr>";
            for (var j = 0; j < columns; j++) {
                html += "<td>Cell</td>";
            }
            html += "</tr>";
        }
        html += "</table>";
        document.execCommand('insertHTML', false, html);
    }
}

function insertHorizontalLine() {
    document.execCommand('insertHorizontalRule');
}

function undo() {
    document.execCommand('undo');
}

function redo() {
    document.execCommand('redo');
}

function pasteAsPlainText() {
    document.execCommand('insertText', false, prompt("Enter text:"));
}

function pasteFromWord() {
    document.execCommand('paste', false, prompt("Paste from Word:"));
}

function pasteAsHtml() {
    document.execCommand('insertHTML', false, prompt("Enter HTML:"));
}

function find() {
    var searchText = prompt("Enter text to find:");
    if (searchText) {
        var sel = window.getSelection();
        sel.removeAllRanges();
        var range = document.createRange();
        range.selectNodeContents(document.getElementById('editor'));
        sel.addRange(range);
        document.execCommand('find', false, searchText);
    }
}

function replace() {
    var searchText = prompt("Enter text to find:");
    var replaceText = prompt("Enter text to replace with:");
    if (searchText && replaceText) {
        var sel = window.getSelection();
        sel.removeAllRanges();
        var range = document.createRange();
        range.selectNodeContents(document.getElementById('editor'));
        sel.addRange(range);
        document.execCommand('find', false, searchText);
        document.execCommand('insertText', false, replaceText);
    }
}

function selectAll() {
    var sel = window.getSelection();
    sel.removeAllRanges();
    var range = document.createRange();
    range.selectNodeContents(document.getElementById('editor'));
    sel.addRange(range);
}

function cut() {
    document.execCommand('cut');
}

function copy() {
    document.execCommand('copy');
}

function paste() {
    document.execCommand('paste');
}

function specialCharacters() {
    // You can implement this function based on your specific requirements for inserting special characters.
    // For example, you could have a modal/dialog with a list of special characters that users can choose from.
    // When a special character is selected, you can insert it into the editor using document.execCommand('insertText', false, char);
}

function spellChecker() {
    // CKEditor automatically performs spell checking, but for a custom editor, you would need to integrate a spell checking library or service.
}

function toggleSource() {
    document.execCommand('source');
}

function maximize() {
    // This function can be implemented to toggle between fullscreen and normal mode.
    // You can adjust the editor's CSS styles to expand it to fullscreen.
}

function showBlocks() {
    // This function can be implemented to toggle the visibility of block elements in the editor.
    // You can adjust the editor's CSS styles to display block elements differently.
}

function insertPageBreak() {
    document.execCommand('insertHTML', false, '<hr style="page-break-after: always;">');
}