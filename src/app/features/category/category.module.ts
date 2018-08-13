import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';

import { CategoryRoutingModule } from './category-routing.module';
import { CategoryComponent } from './containers/category/category.component';
import { RouterModule } from '@angular/router';
import { SharedModule } from '@app/shared/shared.module';

@NgModule({
  imports: [
    SharedModule,
    CategoryRoutingModule
  ],
  declarations: [CategoryComponent]
})
export class CategoryModule { }
