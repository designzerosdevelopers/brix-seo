<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Custom Editor with SEO Input Form</title>
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">


</head>

<body>

    <div class="container">
        <h2 class="mt-4">SEO Input Form</h2>
        <form id="seo-form">
            <div class="form-group">
                <label for="title">Title:</label>
                <input type="text" class="form-control" id="title" name="title" placeholder="Enter title...">
            </div>

            <div class="form-group">
                <label for="featured-image">Featured Image:</label>
                <input type="text" class="form-control" id="featured-image" name="featured-image">
                <small class="form-text text-muted">Provide an image URL for the featured image.</small>
            </div>

            <div class="editor-container">
                <!-- Editor toolbar and content here -->
            </div>

            <!-- Tabs -->
            <ul class="nav nav-tabs">
                <li class="nav-item">
                    <a class="nav-link active" href="#seo-tab">SEO</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#readability-tab">Readability</a>
                </li>
            </ul>

            <!-- Tab Content -->
            <div class="tab-content">
                <div id="seo-tab" class="tab-pane fade show active">
                    <!-- SEO fields -->
                    <div class="form-group">
                        <label for="seo-title">SEO Title:</label>
                        <input type="text" class="form-control" id="seo-title" name="seo-title"
                            placeholder="Enter SEO title...">
                    </div>

                    <div class="card">
                        <div class="card-body">
                            <section>
                                <div id="yoast-snippet-preview-container" class="row">
                                    <div class="col">
                                        <div class="row">
                                            <div class="col">
                                                <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAYAAAAf8/9hAAABs0lEQVR4AWL4//8/RRjO8Iucx+noO0MWUDo16FYABMGP6ZfUcRnWtm27jVPbtm3bttuH2t3eFPcY9pLz7NxiLjCyVd87pKnHyqXyxtCs8APd0rnyxiu4qSeA3QEDrAwBDrT1s1Rc/OrjLZwqVmOSu6+Lamcpp2KKMA9PH1BYXMe1mUP5qotvXTywsOEEYHXxrY+3cqk6TMkYpNr2FeoY3KIr0RPtn9wQ2unlA+GMkRw6+9TFw4YTwDUzx/JVvARj9KaedXRO8P5B1Du2S32smzqUrcKGEyA+uAgQjKX7zf0boWHGfn71jIKj2689gxp7OAGShNcBUmLMPVjZuiKcA2vuWHHDCQxMCz629kXAIU4ApY15QwggAFbfOP9DhgBJ+nWVJ1AZAfICAj1pAlY6hCADZnveQf7bQIwzVONGJonhLIlS9gr5mFg44Xd+4S3XHoGNPdJl1INIwKyEgHckEhgTe1bGiFY9GSFBYUwLh1IkiJUbY407E7syBSFxKTszEoiE/YdrgCEayDmtaJwCI9uu8TKMuZSVfSa4BpGgzvomBR/INhLGzrqDotp01ZR8pn/1L0JN9d9XNyx0AAAAAElFTkSuQmCC"
                                                    alt="" class="img-fluid">
                                            </div>
                                            <div class="col">
                                                <div class="preview-content">
                                                    <div class="site-name">GetMoviesHD</div>
                                                    <div class="domain">localhost</div>
                                                    <div class="breadcrumb">› gmh</div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="preview-content">
                                            <div class="site-name">GetMoviesHD</div>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="preview-content">Apr 12, 2024 － Please provide a meta description by
                                            editing the snippet below. If you don’t, Google will try to find a relevant
                                            part of your post to show in the search results.</div>
                                    </div>
                                </div>
                            </section>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="slug">Slug:</label>
                        <input type="text" class="form-control" id="slug" name="slug"
                            placeholder="Enter slug...">
                    </div>
                    <div class="form-group">
                        <label for="description">Meta Description:</label>
                        <textarea class="form-control" id="description" name="description" placeholder="Enter meta description..."></textarea>
                    </div>
                    <div class="form-group">
                        <label for="keywords">Focus Keywords (comma-separated):</label>
                        <input type="text" class="form-control" id="keyword" name="keyword"
                            placeholder="Enter focus keywords...">
                    </div>
                </div>
            </div>
            <div id="readability-tab" class="tab-pane fade">
                <!-- Readability fields -->
                <div class="form-group">
                    <!-- Readability fields here -->
                </div>
            </div>
    </div>


    <div class="form-group mt-3">
        <button type="submit" class="btn btn-primary">Save</button>
    </div>
    </form>
    </div>
    <div id="error-messages" class="text-danger"></div>
    <div id="messages" class="text-success"></div>
    <script src="{{ asset('js/rix-editor.js') }}"></script>
    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
    <script>
   function slugify(text) {
        return text.toString().toLowerCase()
            .replace(/\s+/g, '-')           // Replace spaces with -
            .replace(/[^\w\-]+/g, '')       // Remove all non-word chars
            .replace(/\-\-+/g, '-')         // Replace multiple - with single -
            .replace(/^-+/, '')             // Trim - from start of text
            .replace(/-+$/, '');            // Trim - from end of text
    }

    // Attach event listener to the title field
    document.getElementById('title').addEventListener('input', function() {
        var title = this.value; // Get the value of the title field
        var slug = slugify(title); // Generate slug from title
        document.getElementById('slug').value = slug; 
    });

    function checkKeywordInTitle() {
    // Get the input values from the HTML elements
    const inputKeyword = document.getElementById('keyword').value.toLowerCase();
    const title = document.getElementById('title').value.toLowerCase();
    
        // Check if the keyword field is empty
        if (!inputKeyword) {
        console.log("Please add a keyword.");
        return; // Exit the function if keyword field is empty
    }

    // Split the keyword into individual words
    const keywordWords = inputKeyword.split(' ');

    // Check if at least one word of the keyword is present in the title
    const keywordMatch = keywordWords.some(word => title.includes(word));
    
    if (keywordMatch) {
        document.getElementById('messages').innerHTML = "Good job! At least one word of the keyword is present in the title.";
        document.getElementById('error-messages').innerText = "";
    } else {
        document.getElementById('error-messages').innerText = "Focus keyword is not available in the title. Please add it.";
        document.getElementById('messages').innerHTML = "";
    }

}

// Function to run whenever there is a change on the page
function onPageChange() {
    // Run the keyword check function
    checkKeywordInTitle();
}

// Listen for changes on the page
document.addEventListener('DOMContentLoaded', onPageChange);
document.addEventListener('load', onPageChange);
document.addEventListener('input', onPageChange);
document.addEventListener('change', onPageChange);



    </script>

</body>

</html>
