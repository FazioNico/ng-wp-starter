import { NgModule, CUSTOM_ELEMENTS_SCHEMA, APP_INITIALIZER, InjectionToken } from '@angular/core';
import { BrowserModule } from '@angular/platform-browser';
import { RouteReuseStrategy } from '@angular/router';

import { IonicModule, IonicRouteStrategy } from '@ionic/angular';
import { SplashScreen } from '@ionic-native/splash-screen/ngx';
import { StatusBar } from '@ionic-native/status-bar/ngx';

import { AppComponent } from './app.component';
import { AppRoutingModule } from './app-routing.module';
import { AppConfigService } from '@app/app-config.service';
import { HttpClientModule } from '@angular/common/http';

export let AppConfig = new InjectionToken<Array<() => void>>('app.config');
export function AppConfigServiceFactory(config: AppConfigService): Function {
  return () => config.load();
}
export function appConfigFactory(config: AppConfigService) {
  return config.getConfig();
}

export const APP_CONFIG_PROVIDER = [
  AppConfigService,
  {
    provide: APP_INITIALIZER,
    useFactory: AppConfigServiceFactory,
    deps: [AppConfigService],
    multi: true
  },
  {
    provide: AppConfig,
    useFactory: appConfigFactory,
    deps: [AppConfigService],
  }
];

@NgModule({
  declarations: [AppComponent],
  entryComponents: [],
  imports: [
    BrowserModule,
    HttpClientModule,
    AppRoutingModule,
    IonicModule.forRoot()
  ],
  providers: [
    StatusBar,
    SplashScreen,
    { provide: RouteReuseStrategy, useClass: IonicRouteStrategy },
    ...APP_CONFIG_PROVIDER
  ],
  schemas: [CUSTOM_ELEMENTS_SCHEMA],
  bootstrap: [AppComponent]
})
export class AppModule {}
