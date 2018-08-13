import { NgModule, CUSTOM_ELEMENTS_SCHEMA } from '@angular/core';
import { MenuNavComponent } from './containers/menu-nav/menu-nav.component';
import { MenuItemComponent } from './components/menu-item/menu-item.component';
import { CommonModule } from '@angular/common';

@NgModule({
  imports: [
    CommonModule
  ],
  declarations: [
    MenuNavComponent,
    MenuItemComponent
  ],
  exports: [
    MenuNavComponent,
    MenuItemComponent
  ],
  schemas: [CUSTOM_ELEMENTS_SCHEMA]
})
export class MenuNavModule { }
