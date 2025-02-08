import app from 'flarum/forum/app';
import Component from 'flarum/common/Component';

export default class FeaturedImageButton extends Component {
  view() {
    const text = this.attrs.user.featuredImage()
      ? app.translator.trans("flarum-featured-image.forum.featured_image.remove")
      : app.translator.trans("flarum-featured-image.forum.featured_image.add");

    return (
      <button className="Button" type="button" name="add-featured-image" onclick={this.uploadButtonClicked.bind(this)}>
        <span className="Button-label">{text}</span>
        <form style="display: none;">
          <input type="file" multiple={false} onchange={this.uploadImage.bind(this)} />
        </form>
      </button>
    );
  }

  uploadButtonClicked(e) {
    if (this.attrs.user.featuredImage()) {
      this.clearImage();
    } else {
      this.$('input').click();
    }
  }

  uploadImage() {
    const user = this.attrs.user;

    let formData = new FormData();

    formData.append('featuredImage', this.$('input').prop('files')[0]);

    app
      .request({
        url: app.forum.attribute('apiUrl') + '/featured-image/upload',
        method: 'POST',
        body: formData,
      })
      .then((result) => {
        user.save({ featuredImage: result.data[0].attributes.url }).then(() => {
          m.redraw();
        });
      });
  }

  clearImage() {
    const user = this.attrs.user;

    user.save({ featuredImage: null }).then(() => {
      m.redraw();
    });
  }
}
