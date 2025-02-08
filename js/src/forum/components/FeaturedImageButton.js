import app from 'flarum/forum/app';
import Component from "flarum/common/Component";

export default class FeaturedImageButton extends Component  {
    view() {
        return (
            <button className="Button" type="button" name="add-featured-image" onclick={this.uploadButtonClicked.bind(this)}>
                <span className="Button-label">Select Featured Image...</span>
                <form style="display: none;">
                    <input type="file" multiple={false} onchange={this.uploadImage.bind(this)}/>
                </form>
            </button>
        );
    }
    uploadButtonClicked(e) {
        this.$('input').click();
    }

    uploadImage() {
        let formData = new FormData();

        formData.append("featuredImage", this.$('input').prop('files')[0]);

        fetch(app.forum.attribute('apiUrl')  + "/featured-image/upload", {
            method: "POST",
            body: formData,
            credentials: "same-origin"
        })

        .then(response => response.json())
    }
}