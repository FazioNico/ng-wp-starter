import { async, ComponentFixture, TestBed } from '@angular/core/testing';

import { DemoPostComponent } from './demo-post.component';

describe('DemoPostComponent', () => {
  let component: DemoPostComponent;
  let fixture: ComponentFixture<DemoPostComponent>;

  beforeEach(async(() => {
    TestBed.configureTestingModule({
      declarations: [ DemoPostComponent ]
    })
    .compileComponents();
  }));

  beforeEach(() => {
    fixture = TestBed.createComponent(DemoPostComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
