import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';

import { DemocatRoutingModule } from './democat-routing.module';
import { DemocatComponent } from './containers/democat/democat.component';
import { SharedModule } from '@app/shared/shared.module';
import { DemoPostComponent } from './containers/demo-post/demo-post.component';

@NgModule({
  imports: [
    SharedModule,
    DemocatRoutingModule
  ],
  declarations: [DemocatComponent, DemoPostComponent]
})
export class DemocatModule { }
