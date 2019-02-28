using Microsoft.Owin;
using Owin;

[assembly: OwinStartupAttribute(typeof(form.Startup))]
namespace form
{
    public partial class Startup {
        public void Configuration(IAppBuilder app) {
            ConfigureAuth(app);
        }
    }
}
