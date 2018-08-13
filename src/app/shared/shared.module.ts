import { NgModule, CUSTOM_ELEMENTS_SCHEMA } from '@angular/core';
import { IonicModule } from '@ionic/angular';
import { PipesModule } from './pipes';
import { WpApiService } from './services';
import { CommonModule } from '@angular/common';
import { MenuNavModule } from './menu-nav/menu-nav.module';

const SHARED_COMPONENTS: any[] = [
  // add your shared component here
];
const SHARED_SERVICES: any[] = [
  // add your shared services here
  WpApiService
];
const SHARED_IMPORT_MODULES: any[] = [
  // add your import available to export here
  MenuNavModule,
  CommonModule,
  PipesModule,
  IonicModule
];
const SHARED_EXPORT_MODULES: any[] = [
  // add your item available to export here
  ...SHARED_COMPONENTS,
  ...SHARED_IMPORT_MODULES,
];

@NgModule({
  imports: [
    ...SHARED_IMPORT_MODULES,
  ],
  providers: [
    ...SHARED_SERVICES
  ],
  declarations: [
    ...SHARED_COMPONENTS
  ],
  exports: [
    ...SHARED_EXPORT_MODULES
  ],
  schemas: [CUSTOM_ELEMENTS_SCHEMA]
})
export class SharedModule { }
