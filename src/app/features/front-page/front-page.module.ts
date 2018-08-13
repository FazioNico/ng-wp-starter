import { NgModule, CUSTOM_ELEMENTS_SCHEMA } from '@angular/core';

import { FrontPageRoutingModule } from './front-page.routing';
import { FrontPageComponent } from './containers/front-page/front-page.component';
import { SharedModule } from '../../shared/shared.module';

@NgModule({
  imports: [
    FrontPageRoutingModule,
    SharedModule
  ],
  declarations: [FrontPageComponent],
  schemas: [CUSTOM_ELEMENTS_SCHEMA]
})
export class FrontPageModule { }
