import { TestBed, inject } from '@angular/core/testing';

import { WpApiService } from './wp-api.service';

describe('WpApiService', () => {
  beforeEach(() => {
    TestBed.configureTestingModule({
      providers: [WpApiService]
    });
  });

  it('should be created', inject([WpApiService], (service: WpApiService) => {
    expect(service).toBeTruthy();
  }));
});
