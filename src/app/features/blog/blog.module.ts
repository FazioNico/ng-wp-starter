import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';

import { BlogRoutingModule } from './blog-routing.module';
import { HomeComponent } from './containers/home/home.component';
import { RouterModule } from '@angular/router';
import { IonicModule } from '../../../../node_modules/@ionic/angular';
import { SharedModule } from '@app/shared/shared.module';

@NgModule({
  imports: [
    BlogRoutingModule,
    SharedModule
  ],
  declarations: [HomeComponent],
  exports: [RouterModule]
})
export class BlogModule { }
