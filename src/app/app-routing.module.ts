import { NgModule, APP_INITIALIZER, Injector } from '@angular/core';
import { Routes, RouterModule, Router } from '@angular/router';
import { AppConfigService } from '@app/app-config.service';

const routes: Routes = [
  { path: '', redirectTo: 'index', pathMatch: 'full' },
  { path: 'index', loadChildren: './features/front-page/front-page.module#FrontPageModule'},
  { path: 'blog', loadChildren: './features/blog/blog.module#BlogModule'},
  { path: 'page', loadChildren: './features/page/page.module#PageModule'},
  { path: '404', loadChildren: './features/not-found/not-found.module#NotFoundModule'},
  { path: '**', redirectTo: '404', pathMatch: 'full' }
];

@NgModule({
  imports: [RouterModule.forRoot(routes)],
  exports: [RouterModule],
  providers: [
    AppConfigService,
    {
      provide: APP_INITIALIZER,
      useFactory: configServiceFactory,
      deps: [Injector, AppConfigService],
      multi: true
    },
  ]
})
export class AppRoutingModule { }

export function appConfigFactory(config: AppConfigService) {
  return config.getConfig();
}

export function configServiceFactory(injector: Injector, configService: AppConfigService): Function {
  return () => {
  console.log('Getting config in routing module');
  return configService
    .loadRoutes()
    .then(res => {
      const router: Router = injector.get(Router);
      console.log(configService.getConfig());
      if (!res) {
        return;
      }
      const configRoutes = (configService.getConfig().pages)
      .filter((item: any) => !routes.map(r => r.path).includes(item.slug))
      .map(
        item => ({ path: item.slug, loadChildren:
          (item.object || null)
            ? `./features/${item.object}/${item.object}.module#${item.object[0]
                                                                .toUpperCase()}${item.object
                                                                .slice(1)
                                                                .toLowerCase()}Module`
            : './features/page/page.module#PageModule'
          })
      )
      .map(item => {
        router.config.unshift(item);
        return item;
      });
      // console.log('Finale routes---->', [...configRoutes, ...routes]);
      router.resetConfig([...configRoutes, ...routes]);
    });
  };
}
