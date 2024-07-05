# 框架效能測試

## 容器部屬資訊

> Artifact Registry Path: `asia-east1-docker.pkg.dev/nueip-research/ab-test/app`

- 對外提供 3000 通訊埠處理請求

- PHP-FPM
  |參數|設定值|
  |:--:|:--:|
  | max_children | 600 |
  | start_servers | 200 |
  | min_spare_servers | 100 |
  | max_spare_servers | 300 |
  | max_requests | 1000 |

```bash
docker push asia-east1-docker.pkg.dev/nueip-research/ab-test/app:pure-php
docker push asia-east1-docker.pkg.dev/nueip-research/ab-test/app:yii
docker push asia-east1-docker.pkg.dev/nueip-research/ab-test/app:laravel
```

## Google Cloud Run (GCR) 硬體資訊

- 一般

  |參數|設定值|
  |:--:|:--:|
  | CPU 分配方式 | 隨時分配 CPU |
  | 啟動時 CPU 效能強化 | 已啟用 |
  | 並行 | 600 |
  | 要求逾時 | 300 seconds |
  | 執行環境 | 第二代 |

- 自動調度資源

  |參數|設定值|
  |:--:|:--:|
  | 執行個體數量下限 | 1 |
  | 執行個體數量上限 | 1 |

- 容器

  |參數|設定值|
  |:--:|:--:|
  | CPU 限制 | 2 vCPU |
  | 記憶體限制 | 2GB |
