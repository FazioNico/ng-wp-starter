import { Component, OnInit } from '@angular/core';
import { Router } from '@angular/router';
import { Observable } from 'rxjs';
import { WpApiService } from '@app/shared/services';
import { map } from 'rxjs/operators';

@Component({
  selector: 'app-category',
  templateUrl: './category.component.html',
  styleUrls: ['./category.component.scss']
})
export class CategoryComponent implements OnInit {

  public category$: Observable<any>;
  public data$: Observable<any>;

  constructor(
    private _router: Router,
    private _wpApi: WpApiService
  ) { }

  ngOnInit() {
    this.category$ = this._wpApi.getData({path: 'categories', slug: `slug=${this._router.url.slice(1)}`}).pipe(
      map(res => res[0])
    );
    this.data$ = this._wpApi.getData({path: 'posts', slug: `category_name=${this._router.url.slice(1)}`});
  }

}
